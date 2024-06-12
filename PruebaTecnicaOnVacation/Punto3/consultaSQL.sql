-- 3) En el siguiente modelo ER se requiere obtener el nombre de los jugadores,
-- nombre del equipo y fecha del primer partido.

SELECT 
    j.nombre nombre_jugador, e.nombre nombre_equipo, MIN(p.fecha_partido) fecha_primer_partido
FROM jugadores j
INNER JOIN equipos e ON j.fk_equipos = e.id_equipos
INNER JOIN partidos p ON e.id_equipos = p.fk_equipo_local OR e.id_equipos = p.fk_equipo_visitante
GROUP BY j.nombre, e.nombre
ORDER BY fecha_primer_partido ASC;
