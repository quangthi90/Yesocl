
/** admin indexes **/
db.getCollection("admin").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** admin_group indexes **/
db.getCollection("admin_group").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** attribute indexes **/
db.getCollection("attribute").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** attribute_group indexes **/
db.getCollection("attribute_group").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** attribute_type indexes **/
db.getCollection("attribute_type").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** branch indexes **/
db.getCollection("branch").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** branch_category indexes **/
db.getCollection("branch_category").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** city indexes **/
db.getCollection("city").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** company indexes **/
db.getCollection("company").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** company_action indexes **/
db.getCollection("company_action").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** company_group indexes **/
db.getCollection("company_group").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** company_post_category indexes **/
db.getCollection("company_post_category").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** country indexes **/
db.getCollection("country").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** data_type indexes **/
db.getCollection("data_type").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** data_value indexes **/
db.getCollection("data_value").ensureIndex({
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

/** district indexes **/
db.getCollection("district").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** group indexes **/
db.getCollection("group").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** group_action indexes **/
db.getCollection("group_action").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** group_type indexes **/
db.getCollection("group_type").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** setting_config indexes **/
db.getCollection("setting_config").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** street indexes **/
db.getCollection("street").ensureIndex({
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

/** ward indexes **/
db.getCollection("ward").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** admin records **/
db.getCollection("admin").insert({
  "_id": ObjectId("51645b48471dee5c0a000002"),
  "group": {
    "$ref": "admin_group",
    "$id": ObjectId("515f0c69471dee8c1f000000"),
    "$db": "yesocl"
  },
  "password": "16175a44ab00fc50344133037f5774b516d30cf0",
  "salt": "135854562",
  "status": true,
  "username": "superadmin"
});

/** admin_group records **/
db.getCollection("admin_group").insert({
  "_id": ObjectId("515f0c69471dee8c1f000000"),
  "name": "Supper Admin",
  "permissions": [
    {
      "_id": ObjectId("51ea539c471dee080a000000"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("515f03ef471deeac1f000000"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000001"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("515f03ff471deeac1f000001"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000002"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("51d38f3cd874592c09000000"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000003"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("51d39389d874590803000000"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000004"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("51d3942dd874597808000000"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000005"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("51ea5392471dee1c0a000000"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000006"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("51e018be471dee1c0a000000"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000007"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("51828041471dee0808000000"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000008"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("516ab55f913db42c12000000"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000009"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("516ab59e913db47809000002"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a00000a"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("51e01fe9471dee1c0a000001"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a00000b"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("516a683d471dee480b00001a"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a00000c"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("516a684f471dee480b00001b"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a00000d"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("515f04d5471deeac1f000004"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a00000e"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("515f0568471deeac1f000005"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a00000f"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("51d4fab6d874593009000000"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000010"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("516a680e471dee480b000018"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000011"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("516a67a8471dee480b000016"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000012"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("51dd78fb471dee6c09000000"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000013"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("516a6823471dee480b000019"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000014"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("516a67d6471dee480b000017"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000015"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("516a6882471dee480b00001d"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000016"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("516a6871471dee480b00001c"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000017"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("516df1eb976982440f000000"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000018"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("515f0416471deeac1f000002"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("51ea539c471dee080a000019"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("515f042b471deeac1f000003"),
        "$db": "yesocl"
      },
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6230471dee3c0b000000"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a6295471dee480b000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a624b471dee3c0b000002"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("516a62f0471dee480b000008"),
          "$db": "yesocl"
        }
      ]
    }
  ]
});

/** attribute records **/
db.getCollection("attribute").insert({
  "_id": ObjectId("5143c0d9913db4ac08000010"),
  "name": "Postal Code",
  "required": true,
  "haveValue": false,
  "group": {
    "$ref": "attribute_group",
    "$id": ObjectId("5143c037913db4ac08000007"),
    "$db": "yesocl"
  },
  "type": {
    "$ref": "attribute_type",
    "$id": ObjectId("5143c04d913db4ac08000008"),
    "$db": "yesocl"
  }
});
db.getCollection("attribute").insert({
  "_id": ObjectId("5143c0f0913db4ac08000011"),
  "name": "Job title",
  "required": true,
  "haveValue": false,
  "group": {
    "$ref": "attribute_group",
    "$id": ObjectId("5143c037913db4ac08000007"),
    "$db": "yesocl"
  },
  "type": {
    "$ref": "attribute_type",
    "$id": ObjectId("5143c04d913db4ac08000008"),
    "$db": "yesocl"
  }
});
db.getCollection("attribute").insert({
  "_id": ObjectId("5143c109913db4ac08000012"),
  "name": "Company",
  "required": true,
  "haveValue": false,
  "group": {
    "$ref": "attribute_group",
    "$id": ObjectId("5143c037913db4ac08000007"),
    "$db": "yesocl"
  },
  "type": {
    "$ref": "attribute_type",
    "$id": ObjectId("5143c04d913db4ac08000008"),
    "$db": "yesocl"
  }
});
db.getCollection("attribute").insert({
  "_id": ObjectId("5143c11e913db4ac08000013"),
  "name": "Most recent job title",
  "required": true,
  "haveValue": false,
  "group": {
    "$ref": "attribute_group",
    "$id": ObjectId("5143c037913db4ac08000007"),
    "$db": "yesocl"
  },
  "type": {
    "$ref": "attribute_type",
    "$id": ObjectId("5143c04d913db4ac08000008"),
    "$db": "yesocl"
  }
});
db.getCollection("attribute").insert({
  "_id": ObjectId("5143c132913db4ac08000014"),
  "name": "Most recent company",
  "required": true,
  "haveValue": false,
  "group": {
    "$ref": "attribute_group",
    "$id": ObjectId("5143c037913db4ac08000007"),
    "$db": "yesocl"
  },
  "type": {
    "$ref": "attribute_type",
    "$id": ObjectId("5143c04d913db4ac08000008"),
    "$db": "yesocl"
  }
});
db.getCollection("attribute").insert({
  "_id": ObjectId("5143c151913db4ac08000015"),
  "name": "Year form",
  "required": true,
  "haveValue": false,
  "group": {
    "$ref": "attribute_group",
    "$id": ObjectId("5143c037913db4ac08000007"),
    "$db": "yesocl"
  },
  "type": {
    "$ref": "attribute_type",
    "$id": ObjectId("5143c0b0913db4ac0800000f"),
    "$db": "yesocl"
  }
});
db.getCollection("attribute").insert({
  "_id": ObjectId("5143c168913db4ac08000016"),
  "name": "Year to",
  "required": true,
  "haveValue": false,
  "group": {
    "$ref": "attribute_group",
    "$id": ObjectId("5143c037913db4ac08000007"),
    "$db": "yesocl"
  },
  "type": {
    "$ref": "attribute_type",
    "$id": ObjectId("5143c0b0913db4ac0800000f"),
    "$db": "yesocl"
  }
});
db.getCollection("attribute").insert({
  "_id": ObjectId("5143c17b913db4ac08000017"),
  "name": "College\/University",
  "required": true,
  "haveValue": false,
  "group": {
    "$ref": "attribute_group",
    "$id": ObjectId("5143c037913db4ac08000007"),
    "$db": "yesocl"
  },
  "type": {
    "$ref": "attribute_type",
    "$id": ObjectId("5143c04d913db4ac08000008"),
    "$db": "yesocl"
  }
});
db.getCollection("attribute").insert({
  "_id": ObjectId("5143c21f913db4ac0800001b"),
  "name": "Time peroid",
  "required": true,
  "haveValue": true,
  "group": {
    "$ref": "attribute_group",
    "$id": ObjectId("5143c037913db4ac08000007"),
    "$db": "yesocl"
  },
  "type": {
    "$ref": "attribute_type",
    "$id": ObjectId("5143c0a1913db4ac0800000e"),
    "$db": "yesocl"
  }
});
db.getCollection("attribute").insert({
  "_id": ObjectId("5143c197913db4ac08000018"),
  "group": {
    "$ref": "attribute_group",
    "$id": ObjectId("5143c037913db4ac08000007"),
    "$db": "yesocl"
  },
  "haveValue": true,
  "name": "I am currently",
  "required": true,
  "type": {
    "$ref": "attribute_type",
    "$id": ObjectId("5143c093913db4ac0800000d"),
    "$db": "yesocl"
  },
  "values": [
    {
      "_id": ObjectId("5143c1ba913db4ac08000019"),
      "name": "Employed",
      "referenceAttributes": [
        {
          "$ref": "attribute",
          "$id": ObjectId("5143c0f0913db4ac08000011"),
          "$db": "yesocl"
        },
        {
          "$ref": "attribute",
          "$id": ObjectId("5143c109913db4ac08000012"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("5143c1e6913db4ac0800001a"),
      "name": "Job Seeker",
      "referenceAttributes": [
        {
          "$ref": "attribute",
          "$id": ObjectId("5143c11e913db4ac08000013"),
          "$db": "yesocl"
        },
        {
          "$ref": "attribute",
          "$id": ObjectId("5143c132913db4ac08000014"),
          "$db": "yesocl"
        },
        {
          "$ref": "attribute",
          "$id": ObjectId("5143c21f913db4ac0800001b"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("5143c26c913db4ac0800001d"),
      "name": "Student",
      "referenceAttributes": [
        {
          "$ref": "attribute",
          "$id": ObjectId("5143c17b913db4ac08000017"),
          "$db": "yesocl"
        },
        {
          "$ref": "attribute",
          "$id": ObjectId("5143c23c913db4ac0800001c"),
          "$db": "yesocl"
        }
      ]
    }
  ]
});
db.getCollection("attribute").insert({
  "_id": ObjectId("5143c23c913db4ac0800001c"),
  "group": {
    "$ref": "attribute_group",
    "$id": ObjectId("5143c037913db4ac08000007"),
    "$db": "yesocl"
  },
  "haveValue": true,
  "name": "Dates attended",
  "required": true,
  "type": {
    "$ref": "attribute_type",
    "$id": ObjectId("5143c0a1913db4ac0800000e"),
    "$db": "yesocl"
  },
  "values": [
    {
      "_id": ObjectId("5143c282913db4ac0800001e"),
      "name": "Date",
      "referenceAttributes": [
        {
          "$ref": "attribute",
          "$id": ObjectId("5143c151913db4ac08000015"),
          "$db": "yesocl"
        },
        {
          "$ref": "attribute",
          "$id": ObjectId("5143c168913db4ac08000016"),
          "$db": "yesocl"
        }
      ]
    }
  ]
});

/** attribute_group records **/
db.getCollection("attribute_group").insert({
  "_id": ObjectId("5143c037913db4ac08000007"),
  "name": "User Register"
});

/** attribute_type records **/
db.getCollection("attribute_type").insert({
  "_id": ObjectId("5143c04d913db4ac08000008"),
  "name": "Text Box"
});
db.getCollection("attribute_type").insert({
  "_id": ObjectId("5143c05d913db4ac08000009"),
  "name": "Text Area"
});
db.getCollection("attribute_type").insert({
  "_id": ObjectId("5143c06a913db4ac0800000a"),
  "name": "Check Box"
});
db.getCollection("attribute_type").insert({
  "_id": ObjectId("5143c07a913db4ac0800000b"),
  "name": "Select Box"
});
db.getCollection("attribute_type").insert({
  "_id": ObjectId("5143c087913db4ac0800000c"),
  "name": "Date Time"
});
db.getCollection("attribute_type").insert({
  "_id": ObjectId("5143c093913db4ac0800000d"),
  "name": "Radio Button"
});
db.getCollection("attribute_type").insert({
  "_id": ObjectId("5143c0a1913db4ac0800000e"),
  "name": "Reference"
});
db.getCollection("attribute_type").insert({
  "_id": ObjectId("5143c0b0913db4ac0800000f"),
  "name": "Year"
});

/** branch records **/
db.getCollection("branch").insert({
  "_id": ObjectId("51d39bb1d87459c40a000018"),
  "company": {
    "$ref": "company",
    "$id": ObjectId("51e97c88471dee180a000000"),
    "$db": "yesocl"
  },
  "name": "Food",
  "status": true
});
db.getCollection("branch").insert({
  "_id": ObjectId("51d39ba5d87459c40a000017"),
  "company": {
    "$ref": "company",
    "$id": ObjectId("51e97c88471dee180a000000"),
    "$db": "yesocl"
  },
  "name": "Stockin",
  "posts": [
    {
      "_id": ObjectId("51ea5a44471dee1c0a000005"),
      "author": "user1",
      "category": {
        "$ref": "branch_category",
        "$id": ObjectId("51d3ceced874596804000000"),
        "$db": "yesocl"
      },
      "content": "&lt;p&gt;\r\n\t&lt;strong&gt;Vùng hỗ trợ để tiếp tục xu hướng tăng ngắn hạn: 490. &amp;nbsp;Thủng vùng này không mua thêm, chờ xác định rõ xu hướng , nếu kéo lên lại vượt 498 mới mua, chỉ mua ngắn hạn, ưu tiên cổ phiếu có sẵn, mua thấp bán cao, lên chạm kháng cự &amp;nbsp;512.5 \/ 530thấy yếu nên bán ra chốt lãi phần mua thêm sau. Vùng 530 thấy phân phối vol mạnh cao đột biến nên bán chốt danh mục giữ tiền mặt; nếu duy trì vol tốt ổn định có nhiều thông tin tốt hỗ trợ nên giữ chờ vượt 530 có thể tăng thêm lượng cổ phiếu, kỳ vọng 550.&lt;\/strong&gt;&lt;\/p&gt;\r\n",
      "created": ISODate("2013-07-20T09:37:08.0Z"),
      "description": "&lt;p&gt;\r\n\t&lt;strong&gt;Vượt 498 khả năng tăng ngắn hạn lên 512.5. kháng cự cao hơn là 530.&lt;\/strong&gt;&lt;\/p&gt;\r\n",
      "email": "quangthi_90@yahoo.com.vn",
      "slug": "lang-kinh-yestoc-3105-chung-toi-van-duy-tri-quan-diem-than-trong-51ea5a44471dee1c0a000004",
      "status": true,
      "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/51ea5a44471dee1c0a000005\/thumb.png",
      "title": "Lăng kính Yestoc 31\/05: “chúng tôi vẫn duy trì quan điểm thận trọng”",
      "updated": ISODate("2013-07-20T10:02:38.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "status": true
});

/** branch_category records **/
db.getCollection("branch_category").insert({
  "_id": ObjectId("51d3a0cad87459c40a000019"),
  "name": "Phân tích chuyên sâu",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "order": 10
});
db.getCollection("branch_category").insert({
  "_id": ObjectId("51d3ceced874596804000000"),
  "name": "Nhận định thị trường",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "order": 20
});
db.getCollection("branch_category").insert({
  "_id": ObjectId("51d3d07fd874591406000000"),
  "name": "Cổ Phiếu Đầu Cơ",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "order": 30
});
db.getCollection("branch_category").insert({
  "_id": ObjectId("51d3d0c0d874591406000001"),
  "name": "Tài chính ngân hàng",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "parent": {
    "$ref": "branch_category",
    "$id": ObjectId("51d3a0cad87459c40a000019"),
    "$db": "yesocl"
  },
  "order": 11
});
db.getCollection("branch_category").insert({
  "_id": ObjectId("51d3d0d6d874591406000002"),
  "name": "Kinh tế vĩ mô",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "parent": {
    "$ref": "branch_category",
    "$id": ObjectId("51d3a0cad87459c40a000019"),
    "$db": "yesocl"
  },
  "order": 12
});
db.getCollection("branch_category").insert({
  "_id": ObjectId("51d3d112d874591406000003"),
  "name": "Doanh Nghiệp",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "parent": {
    "$ref": "branch_category",
    "$id": ObjectId("51d3a0cad87459c40a000019"),
    "$db": "yesocl"
  },
  "order": 13
});

/** city records **/
db.getCollection("city").insert({
  "_id": ObjectId("5143bfca913db4a408000012"),
  "country": {
    "$ref": "country",
    "$id": ObjectId("5143bfa3913db4a408000011"),
    "$db": "yesocl"
  },
  "name": "HCM",
  "status": true
});

/** company records **/
db.getCollection("company").insert({
  "_id": ObjectId("51e97c88471dee180a000000"),
  "branchs": [
    {
      "$ref": "branch",
      "$id": ObjectId("51d39ba5d87459c40a000017"),
      "$db": "yesocl"
    }
  ],
  "created": ISODate("2013-07-19T17:51:04.0Z"),
  "description": "&lt;p&gt;\r\n\tLorem ipsum dolor sit amet, paulo congue conceptam ex eum, vim at timeam liberavisse, everti ancillae vivendum sed ad. Te vim deseruisse intellegebat,&lt;\/p&gt;\r\n",
  "group": {
    "$ref": "company_group",
    "$id": ObjectId("516b9417913db47809000003"),
    "$db": "yesocl"
  },
  "groupMembers": [
    {
      "_id": ObjectId("51e97c88471dee180a000001"),
      "actions": [
        
      ],
      "canDel": false,
      "members": [
        {
          "$ref": "user",
          "$id": ObjectId("518f5555471deea409000000"),
          "$db": "yesocl"
        }
      ],
      "name": "Default",
      "status": true
    }
  ],
  "logo": "data\/catalog\/company\/\/logo.png",
  "name": "Yestoc",
  "owner": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  },
  "slug": "yestoc",
  "status": true,
  "updated": ISODate("2013-07-19T17:51:31.0Z")
});

/** company_action records **/
db.getCollection("company_action").insert({
  "_id": ObjectId("51e01a09471dee0c09000000"),
  "name": "Add Member",
  "code": "add_member",
  "order": NumberInt(1)
});
db.getCollection("company_action").insert({
  "_id": ObjectId("51e01a24471dee0c09000002"),
  "name": "Remove Member",
  "code": "remove_member",
  "order": NumberInt(2)
});
db.getCollection("company_action").insert({
  "_id": ObjectId("51e01a32471dee5c09000000"),
  "name": "Add Category",
  "code": "add_category",
  "order": NumberInt(3)
});
db.getCollection("company_action").insert({
  "_id": ObjectId("51e01a45471dee0c09000004"),
  "name": "Remove Category",
  "code": "remove_category",
  "order": NumberInt(4)
});

/** company_group records **/
db.getCollection("company_group").insert({
  "_id": ObjectId("516b9417913db47809000003"),
  "name": "Default",
  "description": "&lt;p&gt;\r\n\tdffdsfdsfdffdsfdsfdffdsfdsfdffdsfdsfdffdsfdsfdffdsfdsfdffdsfdsfdffdsfdsfdffdsfdsfdffdsfdsfdffdsfdsfdffdsfdsf&lt;\/p&gt;\r\n",
  "status": true
});

/** company_post_category records **/
db.getCollection("company_post_category").insert({
  "_id": ObjectId("516c9640976982b00c000000"),
  "name": "Nhận định thị trường",
  "order": 1,
  "status": true
});

/** country records **/
db.getCollection("country").insert({
  "_id": ObjectId("5143bf62913db4a408000010"),
  "name": "China",
  "status": true
});
db.getCollection("country").insert({
  "_id": ObjectId("5143bfa3913db4a408000011"),
  "name": "Việt Nam",
  "status": true
});

/** data_type records **/
db.getCollection("data_type").insert({
  "_id": ObjectId("514af771913db48c05000011"),
  "code": "degree",
  "name": "Degree",
  "status": true
});
db.getCollection("data_type").insert({
  "_id": ObjectId("514af7a3913db48c05000013"),
  "code": "fieldofstudy",
  "name": "Field Of Study",
  "status": true
});
db.getCollection("data_type").insert({
  "_id": ObjectId("514af77a913db48c05000012"),
  "code": "industry",
  "name": "Industry",
  "status": true
});
db.getCollection("data_type").insert({
  "_id": ObjectId("514af76a913db48c05000010"),
  "code": "school",
  "name": "School",
  "status": true
});
db.getCollection("data_type").insert({
  "_id": ObjectId("516e0288976982b00c000014"),
  "name": "IM Type",
  "code": "im_type",
  "status": true
});
db.getCollection("data_type").insert({
  "_id": ObjectId("516e02e4976982640e000027"),
  "name": "Phone Type",
  "code": "phone_type",
  "status": true
});
db.getCollection("data_type").insert({
  "_id": ObjectId("516e033d976982640e000028"),
  "name": "Website Type",
  "code": "website_type",
  "status": true
});
db.getCollection("data_type").insert({
  "_id": ObjectId("516e03b4976982640e00002c"),
  "name": "Visible Type",
  "code": "visible_type",
  "status": true
});

/** data_value records **/
db.getCollection("data_value").insert({
  "_id": ObjectId("514af827913db48c05000014"),
  "name": "Vietnam National University - Ho Chi Minh City",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af76a913db48c05000010"),
    "$db": "yesocl"
  },
  "value": "Vietnam National University - Ho Chi Minh City "
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514af84e913db48c05000015"),
  "name": "University of Economics Ho Chi Minh City",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af76a913db48c05000010"),
    "$db": "yesocl"
  },
  "value": "University of Economics Ho Chi Minh City "
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514af88b913db48c05000016"),
  "name": "Vietnam National University - Ha Noi",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af76a913db48c05000010"),
    "$db": "yesocl"
  },
  "value": "Vietnam National University - Ha Noi "
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514af8f4913db48c05000017"),
  "name": "Master Of Library &amp; Information Science",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af771913db48c05000011"),
    "$db": "yesocl"
  },
  "value": "Master Of Library &amp; Information Science "
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514af917913db48c05000018"),
  "name": "Master Of Technology",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af771913db48c05000011"),
    "$db": "yesocl"
  },
  "value": "Master Of Technology "
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514af952913db48c05000019"),
  "name": "Bachelor Of Engineering",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af771913db48c05000011"),
    "$db": "yesocl"
  },
  "value": "Bachelor Of Engineering "
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514af970913db48c0500001a"),
  "name": "Information Technology",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af7a3913db48c05000013"),
    "$db": "yesocl"
  },
  "value": "Information Technology "
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514af992913db48c0500001b"),
  "name": "Economics",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af7a3913db48c05000013"),
    "$db": "yesocl"
  },
  "value": "Economics "
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514af9b3913db48c0500001c"),
  "name": "Accounting",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af7a3913db48c05000013"),
    "$db": "yesocl"
  },
  "value": "Accounting"
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514b094d913db4ac0800001f"),
  "name": "Banking",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af77a913db48c05000012"),
    "$db": "yesocl"
  },
  "value": "Banking "
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514b0970913db4ac08000020"),
  "name": "Chemicals",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af77a913db48c05000012"),
    "$db": "yesocl"
  },
  "value": "Chemicals "
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514b0983913db4ac08000021"),
  "name": "Design",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af77a913db48c05000012"),
    "$db": "yesocl"
  },
  "value": "Design "
});
db.getCollection("data_value").insert({
  "_id": ObjectId("516e02ac976982b00c000015"),
  "name": "Skype",
  "value": "skype",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("516e0288976982b00c000014"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("516e02c7976982640e000026"),
  "name": "Yahoo",
  "value": "yahoo",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("516e0288976982b00c000014"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("516e02f9976982b00c000016"),
  "name": "Mobile",
  "value": "mobile",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("516e02e4976982640e000027"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("516e030c976982b00c000017"),
  "name": "Telephone",
  "value": "telephone",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("516e02e4976982640e000027"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("516e0364976982640e000029"),
  "name": "Personal Website",
  "value": "personal",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("516e033d976982640e000028"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("516e0377976982640e00002a"),
  "name": "Company Website",
  "value": "company",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("516e033d976982640e000028"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("516e038b976982640e00002b"),
  "name": "Other...",
  "value": "other",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("516e033d976982640e000028"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("516e03d0976982640e00002d"),
  "name": "My Follow",
  "value": "myfollow",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("516e03b4976982640e00002c"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("516e03e4976982640e00002e"),
  "name": "My Network",
  "value": "mynetwork",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("516e03b4976982640e00002c"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("516e03f5976982640e00002f"),
  "name": "Every One",
  "value": "everyone",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("516e03b4976982640e00002c"),
    "$db": "yesocl"
  }
});

/** design_action records **/
db.getCollection("design_action").insert({
  "_id": ObjectId("516a6230471dee3c0b000000"),
  "name": "View",
  "code": "view",
  "order": 1
});
db.getCollection("design_action").insert({
  "_id": ObjectId("516a624b471dee3c0b000002"),
  "name": "Edit",
  "code": "edit",
  "order": 3
});
db.getCollection("design_action").insert({
  "_id": ObjectId("516a6295471dee480b000004"),
  "name": "Insert",
  "code": "insert",
  "order": 2
});
db.getCollection("design_action").insert({
  "_id": ObjectId("516a62b2471dee480b000006"),
  "name": "Delete",
  "code": "delete",
  "order": 4
});
db.getCollection("design_action").insert({
  "_id": ObjectId("516a62f0471dee480b000008"),
  "name": "Change Password",
  "code": "change_password",
  "order": 5
});

/** design_layout records **/
db.getCollection("design_layout").insert({
  "_id": ObjectId("515f03ff471deeac1f000001"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
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
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
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
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62f0471dee480b000008"),
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
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
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
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
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
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Layout Manage",
  "path": "design\/layout"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("516a67d6471dee480b000017"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Type Of Group",
  "path": "group\/type"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("516a67a8471dee480b000016"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Group Manage",
  "path": "group\/group"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("516a680e471dee480b000018"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Comment Of Group",
  "path": "group\/comment"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("516a6823471dee480b000019"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Post Of Group",
  "path": "group\/post"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("516a683d471dee480b00001a"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Data Type Manage",
  "path": "data\/type"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("516a684f471dee480b00001b"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Data Value Manage",
  "path": "data\/value"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("516a6871471dee480b00001c"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Country Manage",
  "path": "localisation\/country"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("516a6882471dee480b00001d"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "City Manage",
  "path": "localisation\/city"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("516ab55f913db42c12000000"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Company",
  "path": "company\/company"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("516ab59e913db47809000002"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Company Group",
  "path": "company\/group"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("51828041471dee0808000000"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Comment Of Company",
  "path": "company\/comment"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("516df1eb976982440f000000"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Config Manager",
  "path": "setting\/config"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("51d38f3cd874592c09000000"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Branch",
  "path": "branch\/branch"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("51d39389d874590803000000"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Category of Branch",
  "path": "branch\/category"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("51d3942dd874597808000000"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Position of Branch",
  "path": "branch\/position"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("51d4fab6d874593009000000"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Action of Group",
  "path": "group\/action"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("51dd78fb471dee6c09000000"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Group Member Of Group",
  "path": "group\/group_member"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("51e018be471dee1c0a000000"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Action of Company",
  "path": "company\/action"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("51e01fe9471dee1c0a000001"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Group Member of Company",
  "path": "company\/group_member"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("51ea5392471dee1c0a000000"),
  "actions": [
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6230471dee3c0b000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a6295471dee480b000004"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a624b471dee3c0b000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    }
  ],
  "name": "Post of Branch",
  "path": "branch\/post"
});

/** district records **/
db.getCollection("district").insert({
  "_id": ObjectId("5143bfec913db4ac08000004"),
  "name": "Gò Vấp",
  "status": false,
  "city": {
    "$ref": "city",
    "$id": ObjectId("5143bfca913db4a408000012"),
    "$db": "yesocl"
  }
});

/** group records **/
db.getCollection("group").insert({
  "_id": ObjectId("51deafed471deed009000000"),
  "author": {
    "$ref": "user",
    "$id": ObjectId("518f5f43471deeb40900001f"),
    "$db": "yesocl"
  },
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "categories": [
    {
      "$ref": "branch_category",
      "$id": ObjectId("51d3a0cad87459c40a000019"),
      "$db": "yesocl"
    },
    {
      "$ref": "branch_category",
      "$id": ObjectId("51d3ceced874596804000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "branch_category",
      "$id": ObjectId("51d3d07fd874591406000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "branch_category",
      "$id": ObjectId("51d3d0c0d874591406000001"),
      "$db": "yesocl"
    },
    {
      "$ref": "branch_category",
      "$id": ObjectId("51d3d0d6d874591406000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "branch_category",
      "$id": ObjectId("51d3d112d874591406000003"),
      "$db": "yesocl"
    }
  ],
  "created": ISODate("2013-07-11T13:15:25.0Z"),
  "description": "Tamquam accommodare pro ne. Sea natum labores lobortis et, elit novum albucius at pri, feugiat gubergren scribentur vis id.",
  "groupMembers": [
    {
      "_id": ObjectId("51deafed471deed009000001"),
      "name": "Default",
      "status": true,
      "canDel": false,
      "actions": [
        
      ],
      "categories": [
        
      ],
      "members": [
        
      ]
    }
  ],
  "name": "Group 1",
  "posts": [
    {
      "_id": ObjectId("51ea5b37471dee2c0a000000"),
      "title": "dfafdas",
      "content": "&lt;p&gt;\r\n\tfas fasdf asdf asf asdf asf asdf asdf asdf asdfd asf adsfa s&lt;\/p&gt;\r\n",
      "status": true,
      "created": ISODate("2013-07-20T09:41:11.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "category": {
        "$ref": "branch_category",
        "$id": ObjectId("51d3a0cad87459c40a000019"),
        "$db": "yesocl"
      }
    }
  ],
  "status": true,
  "sumary": "Partem fastidii ei ius. No illud nonumy cum. Eu vide copiosae comprehensam sit",
  "type": {
    "$ref": "group_type",
    "$id": ObjectId("518f5e39471deeb40900001e"),
    "$db": "yesocl"
  },
  "website": ""
});
db.getCollection("group").insert({
  "_id": ObjectId("51deaf34471deec009000002"),
  "author": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  },
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "categories": [
    {
      "$ref": "branch_category",
      "$id": ObjectId("51d3a0cad87459c40a000019"),
      "$db": "yesocl"
    },
    {
      "$ref": "branch_category",
      "$id": ObjectId("51d3ceced874596804000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "branch_category",
      "$id": ObjectId("51d3d07fd874591406000000"),
      "$db": "yesocl"
    },
    {
      "$ref": "branch_category",
      "$id": ObjectId("51d3d0c0d874591406000001"),
      "$db": "yesocl"
    },
    {
      "$ref": "branch_category",
      "$id": ObjectId("51d3d0d6d874591406000002"),
      "$db": "yesocl"
    },
    {
      "$ref": "branch_category",
      "$id": ObjectId("51d3d112d874591406000003"),
      "$db": "yesocl"
    }
  ],
  "created": ISODate("2013-07-11T13:12:20.0Z"),
  "description": "Saepe veniam homero ei sed, etiam nominavi conceptam ei mei. Dicat mucius temporibus mei ea, et mel vero error virtute. Ut nam quando euismod molestiae, elitr persecuti ea vim. ",
  "groupMembers": [
    {
      "_id": ObjectId("51deaf34471deec009000003"),
      "actions": [
        
      ],
      "canDel": false,
      "categories": [
        
      ],
      "members": [
        {
          "$ref": "user",
          "$id": ObjectId("518f5555471deea409000000"),
          "$db": "yesocl"
        }
      ],
      "name": "Default",
      "status": true
    }
  ],
  "name": "Group 2",
  "posts": [
    {
      "_id": ObjectId("51e99167471dee280a000002"),
      "category": {
        "$ref": "branch_category",
        "$id": ObjectId("51d3d112d874591406000003"),
        "$db": "yesocl"
      },
      "content": "&lt;p&gt;\r\n\t&lt;em&gt;Chúng tôi dự báo thị trường sữa của Việt Nam sẽ tăng trưởng với tốc độ CAGR 17,3% trong 3 năm tới.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Chúng tôi cũng tin tưởng VNM có thể duy trì được tốc độ tăng trưởng doanh thu trên 20%\/năm nhờ giành thêm được thị phần.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Chúng tôi kỳ vọng tăng trưởng trong tương lai của VNM sẽ dựa trên 4 nhóm sản phẩm chính.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Xuất khẩu cũng sẽ là động lực tăng trưởng vững của VNM nhưng chúng tôi cho rằng sẽ không có sự đột biến thần kỳ trong hoạt động này.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Chúng tôi cũng kỳ vọng VNM sẽ có hoạt động M&amp;amp;A quy mô nhỏ tại Việt Nam và nước ngoài.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Tỷ suất lợi nhuận gộp nhiều khả năng đã đạt cao nhất là 36,5% vào 2009 và năm nay sẽ giảm do chi phí đầu vào tăng.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Tỷ suất lợi nhuận sẽ ổn định những năm sau đó và chủ yếu chịu ảnh hưởng của biến động của chi phí đầu vào.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Tiền mặt sẽ tăng lên kể từ năm nay vì các hoạt động đầu tư của công ty hiện đã gần như hoàn tất.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Và chúng tôi kỳ vọng tỷ lệ chi trả cổ tức trên lợi nhuận sẽ tăng dần lên 50%.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Hiện room dành cho NĐTNN của cổ phiếu VNM đã hết nhưng có thể sẽ được nới vào năm 2014.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Định giá cổ phiếu VNM vẫn hợp lý và nếu so với bình quân các doanh nghiệp cùng ngành thì giá cổ phiếu VNM vẫn còn tiềm năng tăng.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Hiện P\/E dự phóng 2013 của cổ phiếu VNM là 17,4 lần và P\/B là 6,1 lần. Chúng tôi tiếp tục duy trì đánh giá Khả quan đối với cổ phiếu VNM.&lt;\/em&gt;&lt;\/p&gt;\r\n",
      "created": ISODate("2013-07-19T19:20:07.0Z"),
      "status": true,
      "title": "CTCP sữa Việt Nam (VNM – HSX): Ước KQKD 6 tháng và triển vọng KQKD 2013&amp;2014. Tiếp tục duy trì đánh giá Khả quan",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "status": true,
  "sumary": "Aliquid accusamus sit ne. Pro an quem libris, te nec porro laudem impetus, sale adolescens pro cu.",
  "type": {
    "$ref": "group_type",
    "$id": ObjectId("518f5e39471deeb40900001e"),
    "$db": "yesocl"
  },
  "website": ""
});

/** group_action records **/
db.getCollection("group_action").insert({
  "_id": ObjectId("51d50140d874592409000000"),
  "name": "Add Category",
  "code": "add_category",
  "order": 1
});
db.getCollection("group_action").insert({
  "_id": ObjectId("51d51918d874592409000004"),
  "name": "Remove Category",
  "code": "remove_category",
  "order": 2
});
db.getCollection("group_action").insert({
  "_id": ObjectId("51d51a93d874592009000030"),
  "name": "Add Member",
  "code": "add_member",
  "order": 3
});
db.getCollection("group_action").insert({
  "_id": ObjectId("51d51aabd874592009000032"),
  "code": "remove_member",
  "name": "Remove Member",
  "order": 4
});

/** group_type records **/
db.getCollection("group_type").insert({
  "_id": ObjectId("518f5e39471deeb40900001e"),
  "name": "Normal"
});

/** setting_config records **/
db.getCollection("setting_config").insert({
  "_id": ObjectId("516a6230471dee3c0b000001"),
  "key": "action_view",
  "value": "view"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("516a624b471dee3c0b000003"),
  "key": "action_edit",
  "value": "edit"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("516a6295471dee480b000005"),
  "key": "action_insert",
  "value": "insert"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("516a62b2471dee480b000007"),
  "key": "action_delete",
  "value": "delete"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("516a62f0471dee480b000009"),
  "key": "action_change_password",
  "value": "change_password"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("516df423976982bc0f000000"),
  "key": "datatype_degree",
  "value": "degree"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("516df43b976982bc0f000001"),
  "key": "datatype_fieldofstudy",
  "value": "fieldofstudy"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("516df449976982bc0f000002"),
  "key": "datatype_industry",
  "value": "industry"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("516df45a976982bc0f000003"),
  "key": "datatype_school",
  "value": "school"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("516e2662976982140f000007"),
  "key": "datatype_im_type",
  "value": "im_type"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("516e267a976982140f000008"),
  "key": "datatype_phone_type",
  "value": "phone_type"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("516e2689976982140f000009"),
  "key": "datatype_visible_type",
  "value": "visible_type"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("516e26a3976982140f00000a"),
  "key": "datatype_website_type",
  "value": "website_type"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("51d50140d874592409000001"),
  "key": "group_action_add_category",
  "value": "add_category"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("51d51919d874592409000005"),
  "key": "group_action_remove_category",
  "value": "remove_category"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("51d51a93d874592009000031"),
  "key": "group_action_add_member",
  "value": "add_member"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("51d51aabd874592009000033"),
  "key": "group_action_remove_member",
  "value": "remove_member"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("51e01a0a471dee0c09000001"),
  "key": "company_action_add_member",
  "value": "add_member"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("51e01a24471dee0c09000003"),
  "key": "company_action_remove_member",
  "value": "remove_member"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("51e01a32471dee5c09000001"),
  "key": "company_action_add_category",
  "value": "add_category"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("51e01a45471dee0c09000005"),
  "key": "company_action_remove_category",
  "value": "remove_category"
});

/** street records **/
db.getCollection("street").insert({
  "_id": ObjectId("5143c020913db4ac08000006"),
  "name": "Thống Nhất",
  "status": true,
  "district": {
    "$ref": "district",
    "$id": ObjectId("5143bfec913db4ac08000004"),
    "$db": "yesocl"
  }
});

/** user records **/
db.getCollection("user").insert({
  "_id": ObjectId("518f5555471deea409000000"),
  "created": ISODate("2013-05-12T08:39:48.0Z"),
  "emails": [
    {
      "_id": ObjectId("51ada7d1d874597c0900000b"),
      "email": "quangthi_90@yahoo.com.vn",
      "primary": true
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("516b4a91913db43009000000"),
    "$db": "yesocl"
  },
  "meta": {
    "_id": ObjectId("51ada7d1d874597c09000002"),
    "firstname": "user1",
    "lastname": "yesocl",
    "birthday": ISODate("2013-06-04T08:39:44.0Z"),
    "sex": 1,
    "headingLine": "",
    "location": {
      "_id": ObjectId("51ada7d1d874597c09000003"),
      "location": "HCM, Việt Nam",
      "cityId": "5143bfca913db4a408000012"
    },
    "postalCode": "84",
    "industry": "Chemicals",
    "industry_id": "514b0970913db4ac08000020",
    "address": "129\/6\/5 Lê Văn Thọ F11 Gò Vấp",
    "ims": [
      {
        "_id": ObjectId("51ada7d1d874597c09000004"),
        "im": "user1",
        "type": "skype",
        "visible": "myfollow"
      }
    ],
    "phones": [
      {
        "_id": ObjectId("51ada7d1d874597c09000005"),
        "phone": "0903000333",
        "type": "mobile",
        "visible": "myfollow"
      }
    ],
    "websites": [
      {
        "_id": ObjectId("51ada7d1d874597c09000006"),
        "url": "www.yesocl.com",
        "title": ""
      }
    ],
    "background": {
      "_id": ObjectId("51ada7d1d874597c09000007"),
      "experiencies": [
        {
          "_id": ObjectId("51ada7d1d874597c09000008"),
          "company": "Yesocl",
          "title": "My Company",
          "location": {
            "_id": ObjectId("51ada7d1d874597c09000009"),
            "location": "HCM, Việt Nam",
            "cityId": "5143bfca913db4a408000012"
          },
          "started": ISODate("2013-01-01T09:39:44.0Z"),
          "ended": ISODate("2013-01-01T09:39:44.0Z"),
          "current": false,
          "description": "Lorem ipsum dolor sit amet, nec in corpora dignissim, nam ea agam zril electram, aperiam vulputate eam ne. Id scaevola mandamus delicatissimi mel, ei prompta nusquam nec. At ferri ridens nam, quo reque expetendis contentiones ut. Mazim aperiri te per, cum adhuc summo in."
        }
      ],
      "educations": [
        {
          "_id": ObjectId("51ada7d1d874597c0900000a"),
          "school": "Vietnam National University - Ho Chi Minh City",
          "school_id": "",
          "started": "2008",
          "ended": "2012",
          "degree": "Master Of Technology",
          "degree_id": "",
          "fieldOfStudy": "Information Technology",
          "fieldOfStudy_id": "",
          "grace": "",
          "societies": "",
          "description": ""
        }
      ],
      "interest": "",
      "maritalStatus": false,
      "adviceForContact": ""
    }
  },
  "password": "918ee61c3343e557ef1e75672fca90da58d8ce06",
  "salt": "09b2a07c9",
  "slug": "user1",
  "status": true,
  "username": "user1"
});
db.getCollection("user").insert({
  "_id": ObjectId("518f5f43471deeb40900001f"),
  "created": ISODate("2013-05-12T09:22:11.0Z"),
  "emails": [
    {
      "_id": ObjectId("51a1cc1f471dee1c0c000009"),
      "email": "user2@test.com",
      "primary": true
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("516b4a91913db43009000000"),
    "$db": "yesocl"
  },
  "meta": {
    "_id": ObjectId("51a1cc1f471dee1c0c000000"),
    "firstname": "user2",
    "lastname": "yesocl",
    "birthday": ISODate("2013-05-26T08:47:27.0Z"),
    "sex": 1,
    "headingLine": "Unum falli aperiri id pro. Ex impetus invenire eam.",
    "location": {
      "_id": ObjectId("51a1cc1f471dee1c0c000001"),
      "location": "HCM, Việt Nam",
      "cityId": "5143bfca913db4a408000012"
    },
    "postalCode": "84",
    "industry": "Chemicals",
    "industry_id": "514b0970913db4ac08000020",
    "address": "129\/6\/5 Lê Văn Thọ F11 Gò Vấp",
    "ims": [
      {
        "_id": ObjectId("51a1cc1f471dee1c0c000002"),
        "im": "user2",
        "type": "skype",
        "visible": "myfollow"
      }
    ],
    "phones": [
      {
        "_id": ObjectId("51a1cc1f471dee1c0c000003"),
        "phone": "0904000444",
        "type": "mobile",
        "visible": "myfollow"
      }
    ],
    "websites": [
      {
        "_id": ObjectId("51a1cc1f471dee1c0c000004"),
        "url": "www.yesocl.com",
        "title": ""
      }
    ],
    "background": {
      "_id": ObjectId("51a1cc1f471dee1c0c000005"),
      "experiencies": [
        {
          "_id": ObjectId("51a1cc1f471dee1c0c000006"),
          "company": "Yesocl",
          "title": "My Company",
          "location": {
            "_id": ObjectId("51a1cc1f471dee1c0c000007"),
            "location": "HCM, Việt Nam",
            "cityId": "5143bfca913db4a408000012"
          },
          "started": ISODate("2013-01-01T09:47:27.0Z"),
          "ended": ISODate("2013-01-01T09:47:27.0Z"),
          "current": false,
          "description": "Sed et utamur argumentum. Eum an habeo ubique efficiantur. Eu sea oporteat vituperatoribus, eos in graecis delicata persecuti. Mel an summo dicit eleifend. Copiosae quaestio mandamus vim et."
        }
      ],
      "educations": [
        {
          "_id": ObjectId("51a1cc1f471dee1c0c000008"),
          "school": "University of Economics Ho Chi Minh City",
          "school_id": "",
          "started": "2009",
          "ended": "2013",
          "degree": "Master Of Technology",
          "degree_id": "",
          "fieldOfStudy": "Accounting",
          "fieldOfStudy_id": "",
          "grace": "Oratio recusabo",
          "societies": "Amet inciderint ex nam, ei vide tota instructior mel. Ut dictas ancillae vix. Posidonium argumentum te sit, ea eius bonorum sea",
          "description": "Elitr regione an his, ad eirmod propriae quo, vel ut unum putant ancillae. Pri omnesque definiebas ex, an omnium reprehendunt sea. An iusto ludus iriure eos, omnes postea id eum. Has pertinacia inciderint ex. Et qui postea vidisse pertinacia. Ne sea probo voluptatibus, an aperiri sadipscing consectetuer eam, ex detraxit adipiscing vix."
        }
      ],
      "interest": "Eu nam eius consul aliquando, choro integre iuvaret no nec, ut pericula scripserit per. Nam eu alii idque, suas patrioque vituperata ex est.",
      "maritalStatus": true,
      "adviceForContact": "Et vim quando vocent theophrastus, cetero ullamcorper ne his"
    }
  },
  "password": "225d31b59e3e1de2d6d7c581e7e74e2cde897552",
  "salt": "dc1668c45",
  "slug": "user2",
  "status": true,
  "username": "user2"
});

/** user_group records **/
db.getCollection("user_group").insert({
  "_id": ObjectId("516b4a91913db43009000000"),
  "name": "Default"
});

/** ward records **/
