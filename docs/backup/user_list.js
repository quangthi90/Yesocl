
/** user_list indexes **/
db.getCollection("user_list").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** user_list records **/
db.getCollection("user_list").insert({
  "_id": ObjectId("53e46ce3b61d03dc1f000000"),
  "name": "Following",
  "description": "",
  "code": "following",
  "users": [
    
  ],
  "status": true
});
db.getCollection("user_list").insert({
  "_id": ObjectId("53e46cf4b61d03dc1f000001"),
  "name": "Notification",
  "description": "",
  "code": "notification",
  "users": [
    
  ],
  "status": true
});
