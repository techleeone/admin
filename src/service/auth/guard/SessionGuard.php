<?php
namespace techadmin\service\auth\guard;

use techadmin\service\auth\contract\Authenticate;
use think\facade\Session;

class SessionGuard implements contract\Guard
{
    use traits\GuardHelper;

    protected $name = 'adminer';

    protected $authenticate;

    protected $user;

    public function __construct(Authenticate $authenticate)
    {
        $this->authenticate = $authenticate;
    }

    public function login(Authenticate $authenticate)
    {
        Session::set($this->getName(), $authenticate->getAuthIdentifier());
        $this->user = $authenticate;
    }

    public function logout()
    {
        Session::delete($this->getName());
        $this->user = null;
    }

    public function getName()
    {
        return 'login_' . $this->name . '_' . sha1(static::class);
    }

    public function user()
    {
        if (!is_null($this->user)) {
            return $this->user;
        }

        $authIdentifier = Session::get($this->getName());

        if (!is_null($authIdentifier)) {
            $this->user = $this->authenticate->retrieveByIdentifier($authIdentifier);
        }
        return $this->user;
    }
}
