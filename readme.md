Project Checklist

- [x] Fix layout
- [x] Fix Protocol List - to show 'contribuinte'/user_id name
- [ ] **Fix User List - showing 's s s s s s' in view**
- [ ] **Fix Protocol Creation - error 'ERROR: SQLSTATE[23000]: Integrity constraint violation: 1452 Cannot add or update a child row: a foreign key constraint fails (`users`.`protocols`, CONSTRAINT `protocols_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`))'**
- [ ] **Fix User Edit - is not updating database - Fatal error: Uncaught TypeError: App\Entity\User::make(): Argument #1 ($payload) must be of type array, bool given, called in C:\xampp\htdocs\mvcbrabo\app\Entity\User.php on line 93 and defined in C:\xampp\htdocs\mvcbrabo\app\Entity\User.php:24 Stack trace: #0 C:\xampp\htdocs\mvcbrabo\app\Entity\User.php(93): App\Entity\User::make(false) #1 C:\xampp\htdocs\mvcbrabo\app\Controllers\UserController.php(68): App\Entity\User::getUser(0) #2 C:\xampp\htdocs\mvcbrabo\index.php(36): App\Controllers\UserController::edit(0) #3 {main} thrown in C:\xampp\htdocs\mvcbrabo\app\Entity\User.php on line 24**
- [x] **Fix User Edit - not getting data from db on input**
- [ ] **Fix User Delete - is not updating database**
- [ ] **Add Protocol Edit**
- [ ] **Add Protocol Delete**
- [ ] **Add login**