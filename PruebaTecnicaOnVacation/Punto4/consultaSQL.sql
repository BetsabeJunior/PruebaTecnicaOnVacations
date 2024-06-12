-- Teniendo en cuenta el modelo ER anterior, escriba una consulta que muestre los nombres
-- de los equipos que tienen mas de 5 partidos como visitante. 

SELECT 
    e.nombre nombre_equipo
FROM equipos e
INNER JOIN partidos p ON e.id_equipos = p.fk_equipo_visitante
GROUP BY e.nombre
HAVING COUNT(p.id_partidos) > 5;
