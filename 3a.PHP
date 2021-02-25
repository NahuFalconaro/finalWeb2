<?

//Para poder realizar los cambios necesarios:
//desde punto de vista de base de datos: hay que crear la tabla usuario, y darle permisos, como por ejemplo:
//el usuario puede realizar todas esos requerimientos, pero el administrador es el que puede ABM viajes.
//la tabla se diferenciaria anonimo = 0, usuario = 1, admin = 2, 
//la tabla usuario seria asi user(id, isAdmin, idPasaje, idComentarios)
//tabla comentario(id, idViaje, idUser, texto, calificacion)
// y a la tabla de pasajes, agregarle el idDel usuario, y sacarle el dni, ya que estaria asociado a su id

//mvc
//para poner calificacion y un texto breve, crearia una api, donde los comentarios y calificaciones se vuelquen ahi, 
//de la misma manera se verificaria que sea usuario mediante la base de datos, y los requerimientos serian funciones en
//sus respectivo modelo


//mvc diagrama quedaria:

//model: ciudad, pasaje, viaje, usuario
//controller: ciudad, pasaje, viaje, usuario
//api: apiController hace los pedidos a los comentarios de los usuarios