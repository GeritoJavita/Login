CREATE TABLE usuarios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE productos(

		id Primaria	int(11)		AUTO_INCREMENT	PRIMARY KEY,				
		nombre	varchar(100)		No	NULL,		
		descripcion	text			No	NULL,			
		precio	decimal(10,2)		No	NULL,			
		stock	int(11)			    No	NULL,		
		imagen	varchar(255)			NULL		


);