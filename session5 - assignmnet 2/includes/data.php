<?php


function add_user($user){
    $users = get_users();
    array_push($users,$user);
    set_users($users);
}



function generate_id(){    
    $users = get_users();
    $last_user = end($users);   
    return $last_user['id']+1;
}

function initialize(){
    $users = [
        [
            'id'=>'1',
            'name'=>'suhrab',
            'age'=>38,
            'email'=>'suhrab.ruin@gmail.com',
            'username'=>'suhrab',
            'password'=>'',
            'image_path'=>'storage/images/profile-demo.png'
        ]        
        ];

        set_users($users);
}


function find_user($username,$password){
    if(empty(get_users())){
        initialize();
    }
    $users = get_users();        
    foreach($users as $user){       
        if($username == $user['username'] && $password==$user['password']){                        
            return $user;            
        }
    }
    return null;
}

function update_path($id,$path){
 

    $users = get_users(); 
    foreach($users as $key => $value)
    {
        if($value['id'] == $id){            
            $users[$key]['image_path'] = $path;           
        }
        
    }
    set_users($users);
}

function find_user_by_id($id){
    $users = get_users(); 
    foreach($users as $key => $value)
    {
        if($value['id'] == $id){            
            return $users[$key];
        }
    }
    return null;    
}

function delete_user($id){    
    if($id==1){        
        return;
    }
    $users = get_users(); 
    foreach($users as $key => $value)
    {
        if($value['id'] == $id){            
           unset($users[$key]);
        }
        
    }
    set_users($users);    
}