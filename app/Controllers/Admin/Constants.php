<?php

namespace App\Controllers\Admin;

// Libraries
use App\Libraries\ConfigType;
//use App\Libraries\LanguageCost;

//
class Constants extends Configs
{
    protected $config_type = ConfigType::CONSTANTS;
    protected $view_edit = 'constants';

    public function __construct()
    {
        parent::__construct();

        // chức năng này sẽ cố định cho 1 ngôn ngữ thôi
        //$this->lang_key = LanguageCost::default_lang();
        $this->lang_key = SITE_LANGUAGE_DEFAULT;
    }

    public function update_constants()
    {
        //
        //print_r($_POST);

        //
        $data = $this->MY_post('data');
        //print_r($data);
        if (empty($data)) {
            $this->base_model->alert('dât EMPTY');
        }

        // chạy vòng lặp và add constants vào file tĩnh
        $meta_default = ConfigType::meta_default($this->config_type);
        print_r($meta_default);

        // mảng các giá trị sẽ được chuyển đổi thành true|false nếu đầu vào là 1|0
        $arr_true_false = [
            'ALLOW_USING_MYSQL_DELETE',
            'WGR_CSP_ENABLE',
            'SITE_LANGUAGE_SUB_FOLDER',
        ];

        //
        $a = [];
        foreach ($data as $k => $v) {
            if ($v == '' || !isset($meta_default[$k])) {
                continue;
            }

            //
            if (in_array($k, $arr_true_false)) {
                if ($v > 0) {
                    $v = 'true';
                } else {
                    $v = 'false';
                }
                $a[] = "defined('$k') || define('$k', $v);";
            } else {
                $a[] = "defined('$k') || define('$k', '$v');";
            }
        }
        //print_r($a);
        //echo implode(PHP_EOL, $a) . PHP_EOL;

        //
        $f = APPPATH . 'Config/DynamicConstants.php';
        echo $f . PHP_EOL;

        //
        if (!empty($a)) {
            file_put_contents($f, str_replace(' ', '', '< ? php') . PHP_EOL . implode(PHP_EOL, $a) . PHP_EOL);
        } else if (file_exists($f)) {
            unlink($f);
        }

        //
        parent::updated($this->config_type);
    }
}