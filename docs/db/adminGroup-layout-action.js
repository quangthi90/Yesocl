
/** admin_group indexes **/
db.getCollection("admin_group").ensureIndex({
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

/** admin_group records **/
db.getCollection("admin_group").insert({
  "_id": ObjectId("515f0c69471dee8c1f000000"),
  "name": "Supper Admin",
  "permissions": [
    {
      "_id": ObjectId("515f0faf471dee841f000024"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("515f03ef471deeac1f000000"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("515bad7e471deee40e000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("515bae15471deed805000001"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("515bae1f471deed805000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("515bae2c471deed805000003"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("515f0faf471dee841f000025"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("515f03ff471deeac1f000001"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("515bad7e471deee40e000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("515bae15471deed805000001"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("515bae1f471deed805000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("515bae2c471deed805000003"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("515f0faf471dee841f000026"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("515f04d5471deeac1f000004"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("515bad7e471deee40e000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("515bae15471deed805000001"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("515bae1f471deed805000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("515bae2c471deed805000003"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("515f0faf471dee841f000027"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("515f0568471deeac1f000005"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("515bad7e471deee40e000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("515bae15471deed805000001"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("515bae1f471deed805000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("515bae2c471deed805000003"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("515f0faf471dee841f000028"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("515f0416471deeac1f000002"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("515bad7e471deee40e000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("515bae15471deed805000001"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("515bae1f471deed805000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("515bae2c471deed805000003"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("515f0faf471dee841f000029"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("515f042b471deeac1f000003"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("515bad7e471deee40e000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("515bae15471deed805000001"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("515bae1f471deed805000002"),
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
      ]
    }
  ]
});

/** design_action records **/
db.getCollection("design_action").insert({
  "_id": ObjectId("515bad7e471deee40e000000"),
  "code": "view",
  "name": "View",
  "order": NumberInt(1)
});
db.getCollection("design_action").insert({
  "_id": ObjectId("515bae15471deed805000001"),
  "code": "edit",
  "name": "Edit",
  "order": NumberInt(3)
});
db.getCollection("design_action").insert({
  "_id": ObjectId("515bae1f471deed805000002"),
  "code": "insert",
  "name": "Insert",
  "order": NumberInt(2)
});
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

/** design_layout records **/
db.getCollection("design_layout").insert({
  "_id": ObjectId("515f03ff471deeac1f000001"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("515bad7e471deee40e000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae15471deed805000001"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae1f471deed805000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae2c471deed805000003"),
      "$db": "yesocl"
    }
  ],
  "name": "Admin Group",
  "path": "admin\/group"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("515f0416471deeac1f000002"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("515bad7e471deee40e000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae15471deed805000001"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae1f471deed805000002"),
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
  "_id": ObjectId("515f042b471deeac1f000003"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("515bad7e471deee40e000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae15471deed805000001"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae1f471deed805000002"),
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
  "name": "User Manage",
  "path": "user\/user"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("515f03ef471deeac1f000000"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("515bad7e471deee40e000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae15471deed805000001"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae1f471deed805000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae2c471deed805000003"),
      "$db": "yesocl"
    }
  ],
  "name": "Admin Manage",
  "path": "admin\/admin"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("515f04d5471deeac1f000004"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("515bad7e471deee40e000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae15471deed805000001"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae1f471deed805000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae2c471deed805000003"),
      "$db": "yesocl"
    }
  ],
  "name": "Action Manage",
  "path": "design\/action"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("515f0568471deeac1f000005"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("515bad7e471deee40e000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae15471deed805000001"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae1f471deed805000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("515bae2c471deed805000003"),
      "$db": "yesocl"
    }
  ],
  "name": "Layout Manage",
  "path": "design\/layout"
});
