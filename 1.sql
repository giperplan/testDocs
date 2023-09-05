SELECT e.department_id
FROM evaluations e
GROUP BY e.department_id
HAVING SUM(CASE WHEN e.value > 5 AND e.gender = true THEN 1 ELSE 0 END) = COUNT(DISTINCT e.respondent_id);