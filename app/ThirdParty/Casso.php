<?php
namespace App\ ThirdParty;

/*
 * Xử lý dữ liệu thanh toán tự động thông qua casso.vn
 * ưu tiên ngân hàng vietinbank
 */

//
class Casso {
    // hàm này sẽ trả về object chứa thông tin thanh toán
    public static function phpInput() {
        ini_set( 'display_errors', 0 );
        error_reporting( E_ALL );
        //error_reporting( E_ALL && E_WARNING && E_NOTICE );
        ini_set( 'log_errors', 1 );
        ini_set( 'error_log', WRITEPATH . '/logs/log-' . date( 'Y-m-d' ) . '.log' );

        //
        $result = [];
        try {
            // TEST data
            //$data_string = '{"error":0,"data":[{"id":1298570,"tid":"FT22201464809738\\BNK","description":"CUSTOMER MBVCB 2246976598 038356 Bill 5756 C T tu 0451001536775 DAO QUOC DAI toi  8101019778888 DAO VIET LONG  MB  Q uan Doi Trace 038356","amount":10000,"cusum_balance":35002,"when":"2022-07-20 21:33:00","bank_sub_acc_id":"8101019778888","subAccId":"8101019778888","virtualAccount":"","virtualAccountName":"","corresponsiveName":"","corresponsiveAccount":"","corresponsiveBankId":"","corresponsiveBankName":""}]}';
            // LIVE data
            $data_string = file_get_contents( 'php://input' );
            if ( empty( $data_string ) ) {
                return NULL;
            }
            file_put_contents( PUBLIC_HTML_PATH . 'test.txt', $data_string, LOCK_EX );
            file_put_contents( PUBLIC_HTML_PATH . 'test.txt', $_SERVER[ 'REQUEST_URI' ], FILE_APPEND );
            file_put_contents( PUBLIC_HTML_PATH . 'test.txt', __CLASS__ . ':' . __LINE__, FILE_APPEND );

            //
            //echo $data_string;
            $data_string = str_replace( '\\', '', $data_string );
            $result[ 'data_string' ] = $data_string;

            // -->
            $data = json_decode( $data_string );
            //print_r( $data );
            //echo __CLASS__ . ':' . __LINE__;
            //die( __CLASS__ . ':' . __LINE__ );

            //
            if ( isset( $data->data ) ) {
                foreach ( $data->data as $k => $v ) {
                    //file_put_contents( PUBLIC_HTML_PATH . 'test.txt', $v->description . "\n", FILE_APPEND );
                    //file_put_contents( PUBLIC_HTML_PATH . 'test.txt', $v->amount . "\n", FILE_APPEND );
                    //file_put_contents( PUBLIC_HTML_PATH . 'test.txt', $v->subAccId . "\n", FILE_APPEND );
                    //file_put_contents( PUBLIC_HTML_PATH . 'test.txt', $v->bank_sub_acc_id . "\n", FILE_APPEND );
                    //file_put_contents( PUBLIC_HTML_PATH . 'test.txt', $v->id . "\n", FILE_APPEND );
                    //file_put_contents( PUBLIC_HTML_PATH . 'test.txt', $v->tid . "\n", FILE_APPEND );

                    // -> lấy order ID theo chữ bill -> tham số bắt buộc
                    $order_id = explode( ' bill ', strtolower( $v->description ) );
                    if ( count( $order_id ) > 1 ) {
                        $order_id = explode( ' ', $order_id[ 1 ] );
                        $order_id = $order_id[ 0 ];

                        //
                        $data->data[ $k ]->order_id = $order_id;
                    } else {
                        $data->data[ $k ] = NULL;
                    }
                }
            } else {
                $data = [];
            }
            $result[ 'data' ] = $data;
            //$result = $data;
        } catch ( Exception $e ) {
            //error_log( $e );
            if ( isset( $_SERVER[ 'HTTP_REFERER' ] ) ) {
                error_log( $_SERVER[ 'HTTP_REFERER' ] );
            }
            error_log( $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine() );
            //error_log( $e->getPrevious() );
            //error_log( $e->getCode() );
            //error_log( $e->getTraceAsString() );
        }

        //
        return $result;
    }
}