/*
 As a solution to the problem of quick search for `bio` I propose to store the hash from `bio` in the stored calculated field:
 */
ALTER TABLE evaluations ADD COLUMN bio_hash CHAR(32) GENERATED ALWAYS AS (MD5(bio)) STORED;

/* 
Create an index for this field:
*/
ALTER TABLE CREATE INDEX bio_hash_index ON evaluations (bio_hash);
