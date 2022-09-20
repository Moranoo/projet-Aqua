SELECT 
users.nom,
users.mail,
users.telephone

FROM users
INNER JOIN messagerie ON messagerie.id = users.id
WHERE users.nom = "bureau";