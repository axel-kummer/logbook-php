<?php
namespace AxelKummer\LogBook\Model;

/**
 * LogBook PHP. Model of an logentry which should be sent to the LogBookServer
 *
 * @category Library
 * @package  axel-kummer/logbook-php
 * @author   Axel Kummer <kummeraxel@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @link     https://github.com/axel-kummer/logbook-php
 */
class LogEntry
{
    /**
     * Name of logger
     *
     * @var string
     */
    private $loggerName;

    /**
     * LogLevel
     *
     * @var string
     */
    private $severity;

    /**
     * LogMessage
     *
     * @var string
     */
    private $message;

    /**
     * LogContext
     *
     * @var array
     */
    private $context;

    /**
     * @var string
     */
    private $time;

    /**
     * LogEntry constructor.
     *
     * @param $severity
     * @param $message
     * @param $context
     */
    public function __construct($loggerName, $severity, $message, array $context = [])
    {
        $this->setLoggerName($loggerName)
            ->setSeverity($severity)
            ->setMessage($message)
            ->setContext($context)
            ->setTime(time());
    }

    /**
     * @return string
     */
    public function getLoggerName()
    {
        return $this->loggerName;
    }

    /**
     * @param string $loggerName
     *
     * @return $this
     */
    public function setLoggerName($loggerName)
    {
        $this->loggerName = str_replace('\\', '.', $loggerName);

        return $this;
    }

    /**
     * @return string
     */
    public function getSeverity()
    {
        return $this->severity;
    }

    /**
     * @param string $severity
     *
     * @return $this
     */
    public function setSeverity($severity)
    {
        $this->severity = $severity;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     *
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return array
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param array $context
     *
     * @return $this
     */
    public function setContext(array $context = [])
    {
        $this->context = $context;

        return $this;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param string $time
     *
     * @return LogEntry
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Converts the model to a json encoded string
     *
     * @return string
     */
    public function __toString()
    {
        $logEntry = [];
        $logEntry['time'] = $this->getTime();
        $logEntry['message'] = $this->getMessage();
        $logEntry['severity'] = $this->getSeverity();
        $logEntry['context'] = $this->getContext();

        return json_encode($logEntry);
    }
}