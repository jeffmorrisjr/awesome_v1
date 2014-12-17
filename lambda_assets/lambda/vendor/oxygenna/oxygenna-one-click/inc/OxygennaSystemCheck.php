<?php
/**
 * One Click System Check
 *
 * @package One Click Installer
 * @subpackage Admin
 *
 * @copyright (c) 2014 Oxygenna.com
 * @license **LICENSE**
 * @version 1.2.0
 * @author Oxygenna.com
 */

abstract class OxygennaSystemCheck
{
    protected $label;
    protected $value;
    protected $ok;
    protected $info;

    public function __construct($label)
    {
        $this->label = $label;
        $this->ok    = false;
        $this->value = '';
        $this->info  = '';
    }

    public function label()
    {
        echo $this->label;
    }

    public function value()
    {
        echo $this->value;
    }

    public function ok()
    {
        return $this->ok;
    }

    public function info()
    {
        echo $this->info;
    }


    protected function condition($var1, $op, $var2)
    {
        switch ($op) {
            case '=':
                return $var1 == $var2;
            case '!=':
                return $var1 != $var2;
            case '>=':
                return $var1 >= $var2;
            case '<=':
                return $var1 <= $var2;
            case '>':
                return $var1 >  $var2;
            case '<':
                return $var1 <  $var2;
            default:
                return true;
        }
    }

    /**
     * ini_to_num function.
     *
     * This function transforms the php.ini notation for numbers (like '2M') to an integer.
     *
     * @access public
     * @param $size
     * @return int
     */
    protected function ini_to_num($size)
    {
        $l      = substr($size, -1);
        $ret    = substr($size, 0, -1);
        switch (strtoupper($l)) {
            case 'P':
                $ret *= 1024;
                // fall through
            case 'T':
                $ret *= 1024;
                // fall through
            case 'G':
                $ret *= 1024;
                // fall through
            case 'M':
                $ret *= 1024;
                // fall through
            case 'K':
                $ret *= 1024;
                // fall through
        }

        return $ret;
    }

    abstract public function check();
}
