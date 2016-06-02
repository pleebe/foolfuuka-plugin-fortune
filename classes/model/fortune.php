<?php

namespace Foolz\FoolFuuka\Plugins\Fortune\Model;

use Foolz\FoolFuuka\Model\Comment;
use Foolz\FoolFrame\Model\Context;

class Fortune
{
    public static function foretell($result)
    {
        $data = $result->getObject();

        if (!$data->radix->getValue('plugin_fortune_enable')) {
            return null;
        }

        /** @var Comment $data */
        if ($data->comment->name !== false || $data->comment->name != '') {
            if (preg_match('/#fortune/', $data->comment->name)) {
                $tell = Rand (1,11);
                $fortune = [];
                if ($tell == 1)
                {
                    $fortune['result'] = "Average Luck";
                    $fortune['color'] = "bac200";
                }
                if ($tell == 2)
                {
                    $fortune['result'] = "Very Bad Luck";
                    $fortune['color'] = "9d05da";
                }
                if ($tell == 3)
                {
                    $fortune['result'] = "Excellent Luck";
                    $fortune['color'] = "fd4d32";
                }
                if ($tell == 4)
                {
                    $fortune['result'] = "Bad Luck";
                    $fortune['color'] = "7fec11";
                }
                if ($tell == 5)
                {
                    $fortune['result'] = "Outlook good";
                    $fortune['color'] = "6023f8";
                }
                if ($tell == 6)
                {
                    $fortune['result'] = "（　´_ゝ`）ﾌｰﾝ ";
                    $fortune['color'] = "16f174";
                }
                if ($tell == 7)
                {
                    $fortune['result'] = "Good news will come to you by mail";
                    $fortune['color'] = "43fd3b";
                }
                if ($tell == 8)
                {
                    $fortune['result'] = "Godly Luck";
                    $fortune['color'] = "e7890c";
                }
                if ($tell == 9)
                {
                    $fortune['result'] = "ｷﾀ━━━━━━(ﾟ∀ﾟ)━━━━━━ !!!!";
                    $fortune['color'] = "00cbb0";
                }
                if ($tell == 10)
                {
                    $fortune['result'] = "Reply hazy, try again";
                    $fortune['color'] = "f51c6a";
                }
                if ($tell == 11)
                {
                    $fortune['result'] = "You will meet a dark handsome stranger";
                    $fortune['color'] = "0893e1";
                }

                $output = '[fortune color="#' . $fortune['color'] . '"]Your fortune: ' . $fortune['result'] . '[/fortune]';
                $data->comment->comment = trim($data->comment->comment . "\n\n" . $output);

                if($data->comment->name=='#fortune') {
                    $data->comment->name = $data->radix->getValue('anonymous_default_name');
                }
                else
                {
                    $data->comment->name = preg_replace('/#fortune/', '', $data->comment->name);
                }
            }
        }

        return null;
    }
}
