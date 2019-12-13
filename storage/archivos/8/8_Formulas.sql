-- estructuras basicas de base de datos
--tipos de datos 
@entero int
@cant decimal(numerosm,decimales)
@caracter char(cantidad)

--tipos de instrucciones

	declare @nombre tipo --declaracion de variables
	--asignar un dato a otra variable por medio de una consulta
	select @var=operador(atributo) from tabla where condicion
	--asignar valor
	set var1 = var2
	--asigna por defecto un valor cuando es null
	isnull(var,0)
	--contar
	count()
	
	select distinct var,var
	from tabla 
	order by var,var
	group by
	having
	


--ciclos
if ( and (num >= num))
	instrucciones





--funciones
create function nombre(@atributo tipo)
returns tipo
as
begin
	returns tipo
end

--ejecutar una funcion
print dbo.funcion(entrada)
--eliminar una funcion
drop function funcion

--funcion que devuelve una tabla
create function nombre(@var int)
returns table
as
return
(
);
--imprimir una funcion que devuekve una tabla
select* from dbo.funcion(valor)

--cursores ejemplo
create function nombre ( valor tipo)
return decimal(12,5)
as
begin
	DECLARE @cant decimal 
	declare c_cursor cursor for select isnull(valor,0) from tablas where condicion
	set @stock=0
	open c_cursor
	fetch c_cursor into @cant -- aqui guardamos los valores que se extrae de los cursores
	while @@fetch_status=0 | if @@fetch_status = 0
		begin
			set @stock= @stock+@cant
			fetch c_cursor into @cant --extrae extraeee
		end
	close c_cursor
	deallocate c_cursor
	return @stock
end

-- PA
create procedure nombre (valor tipo , valor tipo output)
as
	set valor tipo=
return
--ejecutar el PA
declare @var1 decimal(12,2)
execute nombre_pa valor_e,valor_salida output
print @var1

--triggers
create trigger nombre
on tabla
for insert|update|delete
as
	--actualizar 
	update tabla set var1 = var_update, etc where condicion
	DELETE FROM <nombreTabla> WHERE id = '4';
	INSERT INTO nombre_tabla VALUES (valor1, valor2, valor3, .)
	

return




