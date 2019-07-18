create table usuario (
id_usuario int not null primary key auto_increment,
nome_usuario varchar(20) unique,
senha varchar(200),
bloqueado char(1)
);

insert into usuario(nome_usuario,senha,bloqueado)
	values('admin', md5('jaburu'), 'N');