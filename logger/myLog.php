<?php
namespace tpLog;
/**
 * Created by PhpStorm.
 * User: omitobisam
 * Date: 10.08.16
 * Time: 15:55
 */

class MyLog
{
    protected $severity;
    protected $message;

    protected $levels = [
        LOG_CRIT => ['text' => 'Critical', 'color' => 'red' ],
        LOG_NOTICE => ['text' => 'Notice', 'color' => 'orange'],
        LOG_DEBUG => ['text' => 'Debug', 'color' => 'blue'],
        LOG_INFO => ['text' => 'Info', 'color' => 'green'],
        LOG_ALERT => ['text' => 'Alert', 'color' => 'red']
    ];

    public function __construct()
    {
    }

    public function logIt($severity, $message='Nothing')
    {
        $this->setSeverity($severity)
            ->setMessage($message)
            ->setMessageWithSeverity();
//        if ($this->getSeverity() === LOG_CRIT)
//        {
//            $this->setMessage("<font style='color: red'>Crit</font>: ".$this->getMessage());
//        }
        openlog('myapi', LOG_NDELAY, LOG_USER);
        $this->mylog();
        closelog();
    }

    protected function setMessageWithSeverity()
    {
        $levels = $this->levels[$this->getSeverity()];
        $this->setMessage(
            "<span style='color:".$levels['color']."'>".$levels['text']."</span>: "
            ."<i>".$this->getMessage()."</i>");
        return $this;
    }
    public function setSeverity($severity)
    {
        $this->severity = $severity;
        return $this;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function getSeverity()
    {
        return $this->severity;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function mylog()
    {
        return syslog($this->severity, $this->message);
    }
}
