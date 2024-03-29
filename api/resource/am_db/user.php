<?php /** 
* Generated by
* 
*      _____ _          __  __      _     _
*     / ____| |        / _|/ _|    | |   | |
*    | (___ | | ____ _| |_| |_ ___ | | __| | ___ _ __
*     \___ \| |/ / _` |  _|  _/ _ \| |/ _` |/ _ \ '__|
*     ____) |   < (_| | | | || (_) | | (_| |  __/ |
*    |_____/|_|\_\__,_|_| |_| \___/|_|\__,_|\___|_|
*
* The code generator that works in many programming languages
*
*			https://www.skaffolder.com
*
*
* You can generate the code from the command-line
*       https://npmjs.com/package/skaffolder-cli
*
*       npm install -g skaffodler-cli
*
*   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
*
* To remove this comment please upgrade your plan here: 
*      https://app.skaffolder.com/#!/upgrade
*
* Or get up to 70% discount sharing your unique link:
*       https://app.skaffolder.com/#!/register?friend=5c126fc2803b9c6fca3d3509
*
* You will get 10% discount for each one of your friends
* 
*/
?>
<?php
	require_once './db/dbam_dbManager.php';
	
/*
 * SCHEMA DB user
 * 
	{
		email: {
			type: 'String'
		},
		password: {
			type: 'String'
		},
		uid: {
			type: 'String'
		},
		username: {
			type: 'String'
		},
		//RELAZIONI
		
		
		//RELAZIONI ESTERNE
		
		user_contacts: {
			type: Schema.ObjectId,
			ref : "user"
		},
		user_projects: {
			type: Schema.ObjectId,
			ref : "user"
		},
		
	}
 * 
 */


//CRUD METHODS


//CRUD - CREATE


$app->post('/users',	function () use ($app){

	$body = json_decode($app->request()->getBody());
	
	$params = array (
		'email'	=> isset($body->email)?$body->email:'',
		'password'	=> isset($body->password)?$body->password:'',
		'uid'	=> isset($body->uid)?$body->uid:'',
		'username'	=> isset($body->username)?$body->username:'',
		
		'user_contacts' => isset($body->user_contacts)?$body->user_contacts:'',

		'user_projects' => isset($body->user_projects)?$body->user_projects:'',
	);

	$obj = makeQuery("INSERT INTO user (_id, email, password, uid, username , user_contacts , user_projects )  VALUES ( null, :email, :password, :uid, :username , :user_contacts , :user_projects   )", $params, false);
        
	
	echo json_encode($body);
	
});
	
//CRUD - REMOVE

$app->delete('/users/:id',	function ($id) use ($app){
	
	$params = array (
		'id'	=> $id,
	);

	makeQuery("DELETE FROM user WHERE _id = :id LIMIT 1", $params);

});

//CRUD - FIND BY user_projects

$app->get('/users/findByuser_projects/:key',	function ($key) use ($app){	

	$params = array (
		'key'	=> $key,
	);
	makeQuery("SELECT * FROM user WHERE user_projects = :key", $params);
	
});
	
//CRUD - GET ONE
	
$app->get('/users/:id',	function ($id) use ($app){
	$params = array (
		'id'	=> $id,
	);
	
	$obj = makeQuery("SELECT * FROM user WHERE _id = :id LIMIT 1", $params, false);
	
	
	
	echo json_encode($obj);
	
});
	
	
//CRUD - GET LIST

$app->get('/users',	function () use ($app){
	makeQuery("SELECT * FROM user");
});


//CRUD - EDIT

$app->post('/users/:id',	function ($id) use ($app){

	$body = json_decode($app->request()->getBody());
	
	$params = array (
		'id'	=> $id,
		'email'	    => isset($body->email)?$body->email:'',
		'password'	    => isset($body->password)?$body->password:'',
		'uid'	    => isset($body->uid)?$body->uid:'',
		'username'	    => isset($body->username)?$body->username:'',
		'user_contacts'      => isset($body->user_contacts)?$body->user_contacts:'' 
,
		'user_projects'      => isset($body->user_projects)?$body->user_projects:'' 
	);

	$obj = makeQuery("UPDATE user SET  email = :email,  password = :password,  uid = :uid,  username = :username  , user_contacts=:user_contacts , user_projects=:user_projects  WHERE _id = :id LIMIT 1", $params, false);
        
	
	echo json_encode($body);
    	
});


/*
 * CUSTOM SERVICES
 *
 *	These services will be overwritten and implemented in  Custom.js
 */

			
?>