<?php

namespace Illuminate\Foundation\Auth;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     * @return string
     */
    public function redirectPath($entity)
    {
        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }
        if($entity=='student' || $entity==1)
            return property_exists($this, 'redirectTo') ? $this->redirectTo : '/student/panel';
        elseif ($entity=='company' || $entity==2) 
            return property_exists($this, 'redirectTo') ? $this->redirectTo : '/company/panel';    
        elseif ($entity=='admin' || $entity==5) 
            return property_exists($this, 'redirectTo') ? $this->redirectTo : '/admin/panel';    
        elseif ($entity=='professor' || $entity==4) 
            return property_exists($this, 'redirectTo') ? $this->redirectTo : '/professor/panel';    
        elseif ($entity=='alumni' || $entity == 3)
            return property_exists($this, 'redirectTo') ? $this->redirectTo : '/alumni/panel';    
        else
            return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';    
    }
}