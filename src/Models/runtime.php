<?php
require("./logging/customLogger.php"); 
class Runtime {
    private $settings; 
    protected $logger; 
    public $absolutePath; 
    public $relativePath; 
    public $installerFilePath; 
    public $httpHost;
    public $httpProtocol;
    public $rootUrl;
    public $serverString;
    public $workingPaths;

    public function __construct(CustomLogger $logger) {
        $this->logger = $logger;
    }

    public function setSettings(array $settings)
    {
        $this->settings = $settings;
    }

    public function setServer(array $server)
    {
        $this->server = $server;
    }

    public function getLogger() : CustomLogger {
        return $this->logger; 
    }

    public function setLogger(CustomLogger $logger) 
    {
        $this->logger = $logger;
    }

    public function execute(array $settings = null) {
        if ($settings == null) {
            $settings = $this->settings; 
        }

        error_reporting($this->settings['error_reporting']);
        $this->applyPHPSettings($this->settings);
        $this->applyContext();
    }
    private function applyPHPsettings() {
        $settings = $this->settings;
        $runtimeErrorTable = [
            'log_errors' => ini_set('log_errors', (string) $settings['log_errors']),
            'display_errors' => ini_set('display_errors', (string) $settings['display_errors']),
            'error_log' => ini_set('error_log', $settings['error_log']),
            'set_time_limit' => set_time_limit($settings['time_limit']),
            'ini_set' => ini_set('default_charset', $settings['default_charset']),
            'setlocale' => setlocale(LC_ALL, $settings['LC_ALL']),
        ];
        $messageTemplate = 'Unable to set %k value %v (FALSE return value)';
        foreach ($runtimeErrorTable as $key => $value) {
            if (false === $value) {
                $this->logger->addMessage(strtr($messageTemplate, [
                    '%k' => $key,
                    '%v' => var_export($settings[$key], true),
                ]));
                return [var_export($settings[$key], true), $this->logger];
            }
        }
    }

    private function applyContext() {
        // make sure the server is a set
        if (!isset($this->server)) {
            $this->setServer($_SERVER);
        }
        $this->php = phpversion();
        $this->absPath = rtrim(str_replace('\\', '/', dirname(INSTALLER_FILEPATH)), '/') . '/';
        $this->relPath = rtrim(dirname($this->server['SCRIPT_NAME']), '\/') . '/';
        $this->installerFilename = basename(INSTALLER_FILEPATH);
        $this->installerFilepath = INSTALLER_FILEPATH;
        $this->httpHost = $this->server['HTTP_HOST'];
        $this->serverSoftware = $this->server['SERVER_SOFTWARE'];
        $httpProtocol = 'http';
        $isHttpsOn = !empty($this->server['HTTPS']) && strtolower($this->server['HTTPS']) == 'on';
        $isHttpsX = isset($this->server['HTTP_X_FORWARDED_PROTO']) && $this->server['HTTP_X_FORWARDED_PROTO'] == 'https';
        if ($isHttpsOn || $isHttpsX) {
            $httpProtocol .= 's';
        }
        $this->httpProtocol = $httpProtocol;
        $this->rootUrl = $this->httpProtocol . '://' . $this->httpHost . $this->relPath;
        $this->serverString = 'Server ' . $this->httpHost . ' PHP ' . phpversion();
        return $this->setWorkingPaths([INSTALLER_FILEPATH, $this->absPath]);
    }

    protected function setWorkingPaths(array $workingPaths) : void
    {
        $this->workingPaths = $workingPaths;
    }
}