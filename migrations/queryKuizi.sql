START TRANSACTION;

CREATE TABLE `opsionet` (
  `id` int(11) NOT NULL,
  `opsioni` text NOT NULL,
  `pyetja_id` int(11) NOT NULL,
  `sakte` tinyint(1) NOT NULL
); 


CREATE TABLE `pyetjet` (
  `id` int(11) NOT NULL,
  `pyetja` text NOT NULL
);


-- SHTIMI I PRIMARY-KEY:
ALTER TABLE `opsionet`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `pyetjet`
  ADD PRIMARY KEY (`id`);


-- SHTIMI I AUTO-INCREMENT:
ALTER TABLE `opsionet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

ALTER TABLE `pyetjet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT; 
