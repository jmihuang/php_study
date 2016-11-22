<!-- WHERE:設定篩選條件 -->

<!-- BETWEEN 

EXPLAIN SELECT `cID`, `cName`, `sSex`, `cBirthday`, `cMail`, `cPhone`, `cAdd` FROM `student` WHERE `cBirthday` 
BETWEEN '2016-08-01' AND '2016-12-31'

-->

<!-- 比較運算式 > = != <=  => IS NULL

  SELECT `cID`, `cName`, `sSex`, `cBirthday`, `cMail`, `cPhone`, `cAdd` FROM `student` WHERE `cAdd` IS NULL

  AND OR NOT

  SELECT `cID`, `cName`, `sSex`, `cBirthday`, `cMail`, `cPhone`, `cAdd` FROM `student` WHERE `cAdd` IS NULL AND `sSex` = 'F'	

  SELECT `cID`, `cName`, `sSex`, `cBirthday`, `cMail`, `cPhone`, `cAdd` FROM `student` WHERE 
  NOT(`cAdd` IS NULL) AND `sSex` = 'F'
-->


<!-- IN:指定多個篩選

SELECT `cID`, `cName`, `sSex`, `cBirthday`, `cMail`, `cPhone`, `cAdd` FROM `student` 
WHERE `cID` IN (1,2) 
-->


<!-- LIKE:設定字串比對的篩選值
_ 單一字 文_閣 //文書閣  
% 多字   文%閣 //文書閣 //文藏書閣
% 文 %  //內含'文'字

SELECT `cID`, `cName`, `sSex`, `cBirthday`, `cMail`, `cPhone`, `cAdd` FROM `student`
WHERE `cName` LIKE '小%'

 -->

<!-- ASC:由小排到大 DESC:由大排到小
SELECT * FROM `student`
ORDER BY `cBirthday` ASC
 -->


<!-- LIMIT設定查詢筆數
SELECT * FROM `student`
ORDER BY `cBirthday` ASC
LIMIT 0,2
-->


新增欄位
ALTER TABLE `student`
ADD `cHeight` TINYINT(3) UNSIGNED NULL






