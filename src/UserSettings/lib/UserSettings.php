<?php
namespace Dannehl\UserSettings\lib;


/**
 * Class UserSettings
 *
 * @package Dannehl\UserSettings
 */
class UserSettings {


    /** @var array $_conf */
    private $_conf = [];

    /** @var string $_user_id */
    private $_user_id;

    const PATH = 'userconf/';

    function __construct() {
        $this->_user_id = md5(\Auth::user()->id);
    }

    /**
     * Get the value of a config key
     *
     * @param $key
     * @return null
     */
    public function get( $key ) {
        $this->_getConfigVars();
        if (array_key_exists($key,$this->_conf)) {

            if (strpos($this->_conf[$key],',') !== false) {
                return explode(',',$this->_conf[$key]);
            }

            return $this->_conf[$key];
        }
        return null;
    }

    /**
     * Set a new key value pair, or update an existing
     *
     * @param $key
     * @param $value
     */
    public function set( $key, $value ) {

        $this->_getConfigVars();
        $this->_conf[$key] = $value;
        $this->_updateConfigFile();
    }

    /**
     * Get config
     */
    private function _getConfigVars() {

        $file = storage_path( static::PATH . $this->_user_id );

        if (file_exists($file)) {
            // get content
            $lines = explode(PHP_EOL,\File::get($file));
            foreach($lines as $line) {
                $elm = explode('=',$line);
                if (is_array($elm) && count($elm) === 2) {
                    $this->_conf[$elm[0]] = $elm[1];
                }
            }
        } else {
            // create file
            $this->_createNewConfigFile($file);
            $this->_getConfigVars();
        }

    }

    /**
     * Update config file
     */
    private function _updateConfigFile() {

        $ln = [];
        foreach($this->_conf as $key => $val) {
            $ln[] = $key . '=' . $val;
        }
        $file = storage_path( static::PATH . $this->_user_id );
        \File::put($file,implode(PHP_EOL, $ln));
    }

    /**
     * Create new file if not exist
     *
     * @param $file
     */
    private function _createNewConfigFile( $file ) {
        \File::append($file,'');
    }


}