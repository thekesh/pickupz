DROP PROCEDURE IF EXISTS searchEvents$$
CREATE PROCEDURE searchEvents
(
IN lat FLOAT,
IN lng FLOAT,
IN miles INT
)

BEGIN
SET @center = GeomFromText(concat('POINT(',lat,' ',lng,')')); 
SET @radius = miles; 
SET @bbox = CONCAT('POLYGON((', 
X(@center) - @radius, ' ', Y(@center) - @radius, ',', 
X(@center) + @radius, ' ', Y(@center) - @radius, ',', 
X(@center) + @radius, ' ', Y(@center) + @radius, ',', 
X(@center) - @radius, ' ', Y(@center) + @radius, ',', 
X(@center) - @radius, ' ', Y(@center) - @radius, '))' 
); 

SELECT id, name, address, gender, level, AsText(coords), SQRT(POW( ABS( X(coords) - X(@center)), 2) + POW( ABS(Y(coords) - Y(@center)), 2 )) AS distance 
FROM events
WHERE Intersects( coords, GeomFromText(@bbox) ) 
AND SQRT(POW( ABS( X(coords) - X(@center)), 2) + POW( ABS(Y(coords) - Y(@center)), 2 )) < @radius 
ORDER BY distance ASC;

END$$


