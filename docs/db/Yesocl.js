
/** city indexes **/
db.getCollection("city").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** country indexes **/
db.getCollection("country").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** design_action indexes **/
db.getCollection("design_action").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** design_layout indexes **/
db.getCollection("design_layout").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** group indexes **/
db.getCollection("group").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** group_type indexes **/
db.getCollection("group_type").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** user indexes **/
db.getCollection("user").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** user_group indexes **/
db.getCollection("user_group").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** city records **/
db.getCollection("city").insert({
  "_id": ObjectId("515e383b471dee4c0a000003"),
  "name": "HCM",
  "status": true,
  "country": {
    "$ref": "country",
    "$id": ObjectId("515e3828471dee4c0a000002"),
    "$db": "yesocl"
  }
});

/** country records **/
db.getCollection("country").insert({
  "_id": ObjectId("515e3828471dee4c0a000002"),
  "name": "Việt Nam",
  "status": true
});

/** design_action records **/
db.getCollection("design_action").insert({
  "_id": ObjectId("515bae2c471deed805000003"),
  "code": "delete",
  "name": "Delete",
  "order": NumberInt(4)
});
db.getCollection("design_action").insert({
  "_id": ObjectId("515bae43471deed805000004"),
  "code": "change-password",
  "name": "Change Password",
  "order": NumberInt(5)
});
db.getCollection("design_action").insert({
  "_id": ObjectId("515e468f471dee340a000001"),
  "code": "insert",
  "name": "Insert",
  "order": NumberInt(2)
});
db.getCollection("design_action").insert({
  "_id": ObjectId("515e4675471dee340a000000"),
  "code": "view",
  "name": "View",
  "order": NumberInt(1)
});
db.getCollection("design_action").insert({
  "_id": ObjectId("515eab38471dee500a000012"),
  "name": "Edit",
  "code": "edit",
  "order": NumberInt(3)
});

/** design_layout records **/
db.getCollection("design_layout").insert({
  "_id": ObjectId("515e469f471dee340a000002"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("515e4675471dee340a000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515e468f471dee340a000001"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515eab38471dee500a000012"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae2c471deed805000003"),
      "$db": "yesocl"
    }
  ],
  "name": "Admin",
  "path": "admin\/admin"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("515eabfd471dee440a000007"),
  "name": "Admin Group",
  "path": "admin\/group"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("515eac5a471dee440a000008"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("515e4675471dee340a000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515e468f471dee340a000001"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515eab38471dee500a000012"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae2c471deed805000003"),
      "$db": "yesocl"
    }
  ],
  "name": "Action",
  "path": "design\/action"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("515eac6d471dee440a000009"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("515e4675471dee340a000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515e468f471dee340a000001"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515eab38471dee500a000012"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae2c471deed805000003"),
      "$db": "yesocl"
    }
  ],
  "name": "Layout",
  "path": "design\/layout"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("515eacac471dee300a000007"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("515e4675471dee340a000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515e468f471dee340a000001"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515eab38471dee500a000012"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae2c471deed805000003"),
      "$db": "yesocl"
    }
  ],
  "name": "User Group",
  "path": "user\/group"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("515eacbd471dee300a000008"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("515e4675471dee340a000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515e468f471dee340a000001"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515eab38471dee500a000012"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae2c471deed805000003"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae43471deed805000004"),
      "$db": "yesocl"
    }
  ],
  "name": "User",
  "path": "user\/user"
});

/** group records **/

/** group_type records **/

/** user records **/
db.getCollection("user").insert({
  "_id": ObjectId("515e3d32471dee500a000000"),
  "created": ISODate("2013-04-05T02:55:46.0Z"),
  "emails": [
    {
      "_id": ObjectId("515e3d32471dee500a000004"),
      "email": "aaaa@aaa.com",
      "primary": true
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("515e37ca471dee4c0a000000"),
    "$db": "yesocl"
  },
  "meta": {
    "_id": ObjectId("515e3d32471dee500a000001"),
    "firstname": "bommer",
    "lastname": "luu",
    "headingLine": "",
    "location": {
      "_id": ObjectId("515e3d32471dee500a000002"),
      "countryId": "515e3828471dee4c0a000002",
      "country": "Việt Nam",
      "cityId": "515e383b471dee4c0a000003",
      "city": "HCM"
    },
    "postalCode": "84",
    "industry": "Information Technology",
    "address": "12345abcde",
    "background": {
      "_id": ObjectId("515e3d32471dee500a000003"),
      "interest": "",
      "birthday": ISODate("1990-08-12T22:00:00.0Z"),
      "maritalStatus": false,
      "adviceForContact": ""
    }
  },
  "password": "916c5bfab205c98f609382a3457a6ac453890269",
  "status": true,
  "username": "Bommer"
});

/** user_group records **/
db.getCollection("user_group").insert({
  "_id": ObjectId("515e37ca471dee4c0a000000"),
  "name": "Default"
});
