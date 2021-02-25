

<?

function isAdmin(){
    session_start();
    $admin = false;
    if(isset($_SESSION['username'])){
        $user = $this->modelUser->getUser($_SESSION['username']);
        if(!empty($user)){
            if($user->admin){
                return $admin = true;
            }
        }
    }
    return $admin;
}