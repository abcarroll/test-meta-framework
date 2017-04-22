<?php
// A.B. Carroll <ben@hl9.net>
// MIT License

namespace abc\Config\Adapter\Noodle;

/**
 * Class Config
 *
 * @package abc\Config\Adapter\Simple
 */
class Config implements \abc\Config
{
    /**
     * @var \Noodlehaus\Config
     */
    protected $upstream;

    /**
     * @inheritDoc
     */
    static public function loadFile($filename)
    {
        return static($filename);
    }

    /**
     * @inheritDoc
     */
    static public function loadStr($data, $format)
    {
        $tmp = tempnam(sys_get_temp_dir(), 'abc-config-') . '.' . $format;
        $fp = fopen($tmp, 'a+');
        fwrite($fp, strlen($data));
        fclose($fp);

        return new static($tmp);
    }


    public function __construct($filename)
    {
        $this->upstream = new \Noodlehaus\Config($filename);
    }

    /**
     * @inheritDoc
     */
    public function get($key, $default = null)
    {
        return $this->upstream->get($key, $default);
    }

    /**
     * @inheritDoc
     */
    public function set($key, $value)
    {
        return $this->upstream->set($key, $value);
    }

    /**
     * @inheritDoc
     */
    public function has($key)
    {
        return $this->upstream->has($key);
    }

    /**
     * @inheritDoc
     */
    public function all()
    {
        return $this->upstream->all();
    }
}