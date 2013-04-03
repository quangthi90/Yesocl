
/** design_action indexes **/
db.getCollection("design_action").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** design_action records **/
db.getCollection("design_action").insert({
  "_id": ObjectId("515bad7e471deee40e000000"),
  "name": "View",
  "code": "view"
});
db.getCollection("design_action").insert({
  "_id": ObjectId("515bae15471deed805000001"),
  "name": "Edit",
  "code": "edit"
});
db.getCollection("design_action").insert({
  "_id": ObjectId("515bae1f471deed805000002"),
  "name": "Update",
  "code": "update"
});
db.getCollection("design_action").insert({
  "_id": ObjectId("515bae2c471deed805000003"),
  "name": "Delete",
  "code": "delete"
});
db.getCollection("design_action").insert({
  "_id": ObjectId("515bae43471deed805000004"),
  "name": "Change Password",
  "code": "change-password"
});
