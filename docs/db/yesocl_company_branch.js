
/** company_branch indexes **/
db.getCollection("company_branch").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** company_branch records **/
db.getCollection("company_branch").insert({
  "_id": ObjectId("5172917d976982440f000014"),
  "name": "IT",
  "status": true
});
db.getCollection("company_branch").insert({
  "_id": ObjectId("5172919a976982440f000015"),
  "name": "Shoes Maker",
  "status": true
});
