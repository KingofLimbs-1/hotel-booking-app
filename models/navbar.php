<?php

class Navbar {
    private $redirectLink;
    private $imageLink;
    private $registerLink;
    private $loginLink;
    private $profileLink;
    private $userIconLink;
    private $logoutLink;

    public function __construct($redirectLink, $imageLink, $registerLink, $loginLink, $profileLink, $userIconLink, $logoutLink) {
        $this->redirectLink = $redirectLink;
        $this->imageLink = $imageLink;
        $this->registerLink = $registerLink;
        $this->loginLink = $loginLink;
        $this->profileLink = $profileLink;
        $this->userIconLink = $userIconLink;
        $this->logoutLink = $logoutLink;
    }

    public function renderLogo() {
        return '<div class="logo"><a href="' . $this->redirectLink . '"><img src="' . $this->imageLink . '" alt="Logo"></a></div>';
    }

    public function renderNavItems($userID = null) {
        if ($userID === null) {
            return '
                <div class="navItems" id="right">
                    <a href="' . $this->registerLink . '"><p>Register</p></a>
                    <hr>
                    <a href="' . $this->loginLink . '"><p>Login</p></a>
                </div>
            ';
        } else {
            return '
                <div class="navItems" id="right">
                    <a href="' . $this->profileLink . '"><img src="' . $this->userIconLink . '" alt="User Icon"></a>
                    <hr>
                    <a href="' . $this->logoutLink . '"><p>Logout</p></a>
                </div>
            ';
        }
    }
}

?>
