
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
      "_id": ObjectId("51fe1aa6471dee0c0b000001"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b000002"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b000003"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b000004"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b000005"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("51fe1a9b471dee0c0b000000"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b000006"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b000007"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b000008"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b000009"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b00000a"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b00000b"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b00000c"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b00000d"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b00000e"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b00000f"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b000010"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b000011"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b000012"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b000013"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b000014"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b000015"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b000016"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b000017"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b000018"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b000019"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b00001a"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b00001b"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("51ebd206471deec80a000000"),
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
      "_id": ObjectId("51fe1aa6471dee0c0b00001c"),
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
  "name": "Follower",
  "order": NumberInt(2),
  "posts": [
    {
      "_id": ObjectId("51f655bc471deed40c000001"),
      "author": "user1",
      "category": {
        "$ref": "branch_category",
        "$id": ObjectId("51f654df471deeb40c000000"),
        "$db": "yesocl"
      },
      "content": "&lt;p&gt;\r\n\tmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm&lt;\/p&gt;\r\n",
      "created": ISODate("2013-07-29T11:45:00.0Z"),
      "description": "mmmmmmmmmmmmmmmmmmmmmm",
      "email": "quangthi_90@yahoo.com.vn",
      "slug": "mmmmmmmmmmm-51f655bc471deed40c000000",
      "status": true,
      "thumb": "data\/catalog\/branch\/51d39bb1d87459c40a000018\/post\/51f655bc471deed40c000001\/avatar.jpg",
      "title": "mmmmmmmmmmm",
      "updated": ISODate("2013-07-29T11:45:00.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("51f6559a471deee00c000003"),
      "title": "eeeeeeeee",
      "content": "&lt;p&gt;\r\n\teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee&lt;\/p&gt;\r\n",
      "status": true,
      "created": ISODate("2013-07-29T11:44:26.0Z"),
      "updated": ISODate("2013-07-29T11:44:26.0Z"),
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "eeeeeeeee-51f6559a471deee00c000002",
      "thumb": "data\/catalog\/branch\/51d39bb1d87459c40a000018\/post\/51f6559a471deee00c000003\/avatar.jpg",
      "description": "eeeeeeeeeeeeeeeeeeeeeeeeeee",
      "category": {
        "$ref": "branch_category",
        "$id": ObjectId("51f654df471deeb40c000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("51f65584471deee00c000001"),
      "title": "dddddddddd",
      "content": "&lt;p&gt;\r\n\tdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd&lt;\/p&gt;\r\n",
      "status": true,
      "created": ISODate("2013-07-29T11:44:04.0Z"),
      "updated": ISODate("2013-07-29T11:44:04.0Z"),
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "dddddddddd-51f65584471deee00c000000",
      "thumb": "data\/catalog\/branch\/51d39bb1d87459c40a000018\/post\/51f65584471deee00c000001\/avatar.jpg",
      "description": "dddddddddddddddddddd",
      "category": {
        "$ref": "branch_category",
        "$id": ObjectId("51f654df471deeb40c000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("51f65566471deec00c000005"),
      "title": "cccccccccc",
      "content": "&lt;p&gt;\r\n\tcccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc&lt;\/p&gt;\r\n",
      "status": true,
      "created": ISODate("2013-07-29T11:43:34.0Z"),
      "updated": ISODate("2013-07-29T11:43:34.0Z"),
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "cccccccccc-51f65566471deec00c000004",
      "thumb": "data\/catalog\/branch\/51d39bb1d87459c40a000018\/post\/51f65566471deec00c000005\/avatar.jpg",
      "description": "cccccccccccccccccccc",
      "category": {
        "$ref": "branch_category",
        "$id": ObjectId("51f654df471deeb40c000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("51f6554c471deec00c000003"),
      "title": "bbbbbbbbbb",
      "content": "&lt;p&gt;\r\n\tbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb&lt;\/p&gt;\r\n",
      "status": true,
      "created": ISODate("2013-07-29T11:43:08.0Z"),
      "updated": ISODate("2013-07-29T11:43:08.0Z"),
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "bbbbbbbbbb-51f6554c471deec00c000002",
      "thumb": "data\/catalog\/branch\/51d39bb1d87459c40a000018\/post\/51f6554c471deec00c000003\/avatar.jpg",
      "description": "bbbbbbbbbbbbbbbbbbbb",
      "category": {
        "$ref": "branch_category",
        "$id": ObjectId("51f654df471deeb40c000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("51f65533471deec00c000001"),
      "title": "aaaaa",
      "content": "&lt;p&gt;\r\n\taaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa&lt;\/p&gt;\r\n",
      "status": true,
      "created": ISODate("2013-07-29T11:42:43.0Z"),
      "updated": ISODate("2013-07-29T11:42:44.0Z"),
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "aaaaa-51f65533471deec00c000000",
      "thumb": "data\/catalog\/branch\/51d39bb1d87459c40a000018\/post\/51f65533471deec00c000001\/avatar.jpg",
      "description": "aaaaaaaaaaaaaaaaa",
      "category": {
        "$ref": "branch_category",
        "$id": ObjectId("51f654df471deeb40c000000"),
        "$db": "yesocl"
      }
    }
  ],
  "status": false
});
db.getCollection("branch").insert({
  "_id": ObjectId("51d39ba5d87459c40a000017"),
  "company": {
    "$ref": "company",
    "$id": ObjectId("51e97c88471dee180a000000"),
    "$db": "yesocl"
  },
  "name": "Yestoc",
  "order": NumberInt(1),
  "posts": [
    {
      "_id": ObjectId("51ee432d471dee580a000001"),
      "author": "user2",
      "category": {
        "$ref": "branch_category",
        "$id": ObjectId("51d3a0cad87459c40a000019"),
        "$db": "yesocl"
      },
      "comments": [
        
      ],
      "content": "&lt;p&gt;\r\n\t&lt;strong&gt;Tóm tắt view nhận định tuần 15-19\/07&lt;\/strong&gt;: &lt;a href=&quot;http:\/\/yestoc.com\/lang-kinh-yestoc-tuan-15-1907-tan-dung-cac-nhip-dieu-chinh-de-tang-ti-trong-co-phieu\/&quot;&gt;http:\/\/yestoc.com\/lang-kinh-yestoc-tuan-15-1907-tan-dung-cac-nhip-dieu-chinh-de-tang-ti-trong-co-phieu\/&lt;\/a&gt;&lt;br \/&gt;\r\n\t…theo phân tích của chúng tôi thì mục tiêu ngắn hạn của đợt tăng lần này nằm ở vùng 505-507 đối với Vnindex và vùng 64-65-4 đối với Hnxindex, do đó nhà đầu tư nên thận trọng khi cả hai chỉ số tiếp cận vùng này.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tChỉ số VNIndex tăng khá mạnh trong phiên cuối tuần và bức phá ngưỡng kháng cự 498-500, khối lượng duy trì ở mức trung bình cho thấy áp lực bán ra đã được hấp thụ khá tốt trong những phiên trước. Theo quan sát của chúng tôi, thị trường vẫn trong giai đoạn phân hóa mạnh, dòng tiền chỉ tập trung vào các mã largecap như MSN, VNM, GAS, BVH… Trong khi đó, HNXIndex vẫn tiếp tục đi ngang và chưa thể bức phá được vùng 63.5. Chúng tôi cho rằng chỉ số Vnindex sẽ test lại vùng 500( tương đương đường MA50) trong phiên đầu tuần, nếu thanh khoản vẫn tiếp tục duy trì ổn định, thì xu hướng tăng sẽ rõ ràng hơn. Tuy nhiên, như các bản tin trước, chúng tôi đặc biệt lưu ý ngưỡng kháng cự 507, nhà đầu tư cần thận trọng khi Vnindex đi vào vùng này.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật trung hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tTheo đồ thị tuần, hai chỉ số đã hình thành các cây nến tích cực, và khối lượng có sự cải thiện rõ rệt. Vnindex đã bức phá thành công đường MA20 với thanh khoản cao cho thấy xu hướng trung hạn đang có chuyển biến tích cực. Chúng tôi tiếp tục chờ sự cộng hưởng từ chỉ số HNxindex để có thể xác nhận xu hướng trung hạn được bền vững. Do đó, nhà đầu tư trung hạn chỉ nên tiếp tục duy trì mức độ giải ngân thăm dò trong những nhịp điều chỉnh sắp tới trước khi thị trường xác nhận xu thế tăng bền vững.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Chiến lược giao dịch ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;ul&gt;\r\n\t&lt;li&gt;\r\n\t\tChúng tôi vẫn giữ quan điểm như trong các bản tin trước, nhà đầu tư có thể tiếp tục gia tăng tỉ trọng trong những nhịp điều chỉnh của thị trường, tuy nhiên nên cân nhắc tránh mua đuổi khi Vnindex tiệm cận vùng cản 507.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tDanh mục tập trung vào các mã cơ bản đang được tích lũy tốt .&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n",
      "created": ISODate("2013-07-23T08:47:41.0Z"),
      "description": "Tóm tắt view nhận định tuần 15-19\/07...\r\n",
      "email": "user2@test.com",
      "slug": "lang-kinh-yestoc-tuan-22-2607-da-tang-tiep-tuc-duoc-cung-co-51ee432d471dee580a000000",
      "status": true,
      "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/51ee432d471dee580a000001\/avatar.jpg",
      "title": "Lăng kính Yestoc tuần 22-26\/07: “đà tăng tiếp tục được củng cố”",
      "updated": ISODate("2013-08-08T17:02:28.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("51ee4233471dee640a000001"),
      "title": "Lãi suất OMO về 7%, Ngân hàng Nhà nước “dồn dập” bơm vốn",
      "content": "&lt;p&gt;\r\n\t&lt;strong&gt;Ngày 25\/12, theo dữ liệu của Reuters, Ngân hàng Nhà nước đã bơm ra thị trường mở (OMO) 5.000 tỷ đồng, kỳ hạn 7 ngày, với lãi suất 7%\/năm.&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tCùng ngày, Ngân hàng Nhà nước hút về 242 tỷ đồng, đưa mức bơm ròng vốn trong ngày đạt 4.758 tỷ đồng. Như vậy, khối lượng vốn trên OMO còn lưu hành khoảng 7.500 tỷ đồng.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tViệc khối lượng vốn bơm qua thị trường OMO tăng mạnh trong hai ngày đầu tuần diễn ra trong bối cảnh lãi suất giảm 1% về 7%\/năm. Cụ thể, trong hai ngày thứ Hai và thứ Ba, Ngân hàng Nhà nước đã bơm ròng gần 6.300 tỷ đồng trên OMO.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tTrước đó, khi lãi suất ở mức 8%\/năm, giao dịch qua nghiệp vụ repo trên thị trường OMO chỉ quanh mức vài trăm tỷ đồng mỗi phiên.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tCũng trong ngày 25\/12, Ngân hàng Nhà nước tiếp tục không phát hành tín phiếu. Tính từ 15\/3 đến nay, Ngân hàng Nhà nước đã phát hành tổng cộng gần 170 nghìn tỷ đồng tín phiếu, đã đáo hạn trên 114 nghìn tỷ đồng và còn trên 55.600 tỷ đồng tín phiếu chưa đáo hạn.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tTrên thị trường liên ngân hàng hôm 25\/12, lãi suất không có nhiều thay đổi so với các phiên trước, trong đó lãi suất qua đêm được chào ở mức 2,5-3%\/năm, lãi suất kỳ hạn 1 tuần ở mức 3,5-4%\/năm, lãi suất kỳ hạn 1 tháng ở mức 5-6%\/năm và lãi suất kỳ hạn 3 tháng ở mức 6-7%\/năm.&lt;\/p&gt;\r\n&lt;address&gt;\r\n\tNguồn&amp;nbsp;vneconomy&lt;\/address&gt;\r\n",
      "status": true,
      "created": ISODate("2013-07-23T08:43:31.0Z"),
      "updated": ISODate("2013-08-08T17:02:31.0Z"),
      "author": "user2",
      "email": "user2@test.com",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      },
      "slug": "lai-suat-omo-ve-7-percent-ngan-hang-nha-nuoc-don-dap-bom-von-51ee4233471dee640a000000",
      "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/51ee4233471dee640a000001\/thumb.jpg",
      "description": "Ngày 25\/12, theo dữ liệu của Reuters, Ngân hàng Nhà nước...\r\n",
      "category": {
        "$ref": "branch_category",
        "$id": ObjectId("51d3a0cad87459c40a000019"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("51ee41d0471dee300b000001"),
      "title": "Dự đoán diễn biến tái cấu trúc hệ thống ngân hàng: “rất chậm”",
      "content": "&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n\tChúng tôi tin rằng, dù phát biểu thế nào trước công chúng đi nữa, thì việc tái cấu trúc ngân hang sẽ vẫn diễn ra rất chậm chạp. Chúng tôi xin dẫn ra 5 lí do sau:&lt;\/p&gt;\r\n&lt;ul style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;li&gt;\r\n\t\t&lt;strong&gt;Đ&lt;\/strong&gt;&lt;strong&gt;ầ&lt;\/strong&gt;&lt;strong&gt;u tiên, ch&lt;\/strong&gt;&lt;strong&gt;ấ&lt;\/strong&gt;&lt;strong&gt;t lư&lt;\/strong&gt;&lt;strong&gt;ợ&lt;\/strong&gt;&lt;strong&gt;ng thông tin v&lt;\/strong&gt;&lt;strong&gt;ề&lt;\/strong&gt;&lt;strong&gt; mức độ của n&lt;\/strong&gt;&lt;strong&gt;ợ&lt;\/strong&gt;&lt;strong&gt; x&lt;\/strong&gt;&lt;strong&gt;ấ&lt;\/strong&gt;&lt;strong&gt;u v&lt;\/strong&gt;&lt;strong&gt;ẫ&lt;\/strong&gt;&lt;strong&gt;n còn th&lt;\/strong&gt;&lt;strong&gt;ấ&lt;\/strong&gt;&lt;strong&gt;p&lt;\/strong&gt;. Mặc dù NHNN đã công bố tỉ lệ nợ xấu khoảng 8.6%-10%, cao hơn so với con số 4.5%-4.7% được các ngân hang đưa ra, chúng tôi cho rằng con số đó vẫn chưa đánh giá đúng tình hình nợ xấu bởi các tài sản đảm bảo chưa được định giá theo giá thị trường. Một số khu vực tư thống nhất trong việc ước tính tỉ lệ nợ xấu hiện vào khoảng 15%-20%, tuy nhiên các số liệu trên cũng chỉ dựa vào các nguồn thông tin giới hạn. Bản báo cáo kết quả của Chương trình Đánh giá Tài chính của IMF-WB (dự báo sẽ được công bố vào nửa đầu năm 2013 và có thể trùng với Báo cáo thường niên do IMF xuất bản) có thể cung cấp một chút minh bạch về sự yếu ớt của toàn bộ hệ thống tài chính, tuy nhiên chúng tôi tin rằng các thông tin đầu vào quan trọng từ bài nghiên cứu này cũng được cung cấp từ chính phủ, và do đó chất lượng của thông tin vẫn còn chưa rõ ràng.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\t&lt;strong&gt;Việc dựa vào “tính t&lt;\/strong&gt;&lt;strong&gt;ự&lt;\/strong&gt;&lt;strong&gt; giác” trong quá trình tái cơ cấu là không hi&lt;\/strong&gt;&lt;strong&gt;ệ&lt;\/strong&gt;&lt;strong&gt;u qu&lt;\/strong&gt;&lt;strong&gt;ả&lt;\/strong&gt;. Lộ trình dự kiến của việc tái cấu trúc ngân hàng là bắt đầu gom nhóm các ngân hàng, cắt giảm hoạt động cho vay của những ngân hàng yếu (nhóm 4) và buộc các ngân hang này phải tái cấu trúc, nhưng phần lớn lại dựa trên “cơ sở tự giác” mà không cần bơm thêm vốn từ Chính phủ. Trên thực tế đúng là có sự hợp nhất của vài ngân hàng yếu kém, nhưng nếu không bơm vốn mới thì các ngân hàng hợp nhất đó vẫn sẽ còn yếu kém, tuy vậy chúng tôi vẫn chưa thấy ngân hàng nào đóng cửa. Sự tồn tại của các ngân hàng yếu tiếp tục làm tăng chi phí vay vốn ở các ngân hàng khác xuất phát từ sự cạnh tranh trong lãi suất tiền gửi.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\t&lt;table cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n\t\t\t&lt;tbody&gt;\r\n\t\t\t\t&lt;tr&gt;\r\n\t\t\t\t\t&lt;td&gt;\r\n\t\t\t\t\t\t&lt;div&gt;\r\n\t\t\t\t\t\t\t&lt;div&gt;\r\n\t\t\t\t\t\t\t\t&lt;p align=&quot;right&quot;&gt;\r\n\t\t\t\t\t\t\t\t\t&lt;strong&gt;&lt;em&gt;Vi&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;ệ&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;c tái c&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;ấ&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;u trúc ngân hàng v&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;ẫ&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;n di&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;ễ&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;n ra ch&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;ậ&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;m ch&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;ạ&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;p do vi&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;ệ&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;c thi&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;ế&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;u thông tin minh b&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;ạ&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;ch, thi&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;ế&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;u khung pháp lý m&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;ạ&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;nh m&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;ẽ&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;, thi&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;ế&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;u s&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;ự&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt; lãnh đ&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;ạ&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;o và thi&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;ế&lt;\/em&gt;&lt;\/strong&gt;&lt;strong&gt;&lt;em&gt;u nhận thức về tính “cấp thiết” của vấn đề&lt;\/em&gt;&lt;\/strong&gt;&lt;\/p&gt;\r\n\t\t\t\t\t\t\t&lt;\/div&gt;\r\n\t\t\t\t\t\t&lt;\/div&gt;\r\n\t\t\t\t\t&lt;\/td&gt;\r\n\t\t\t\t&lt;\/tr&gt;\r\n\t\t\t&lt;\/tbody&gt;\r\n\t\t&lt;\/table&gt;\r\n\t\t&lt;p&gt;\r\n\t\t\t&lt;strong&gt;Khung pháp lý v&lt;\/strong&gt;&lt;strong&gt;ề&lt;\/strong&gt;&lt;strong&gt; vi&lt;\/strong&gt;&lt;strong&gt;ệ&lt;\/strong&gt;&lt;strong&gt;c x&lt;\/strong&gt;&lt;strong&gt;ử&lt;\/strong&gt;&lt;strong&gt; lý tài s&lt;\/strong&gt;&lt;strong&gt;ả&lt;\/strong&gt;&lt;strong&gt;n x&lt;\/strong&gt;&lt;strong&gt;ấ&lt;\/strong&gt;&lt;strong&gt;u v&lt;\/strong&gt;&lt;strong&gt;ẫ&lt;\/strong&gt;&lt;strong&gt;n chưa có. &lt;\/strong&gt;Việc xử lý tài sản xấu ở các nước Đông Á được quản lý bởi các Cơ quan quản lý tài sản của Chính phủ, trong đó một số cơ quan có đủ quyền lực pháp lý đặc biệt để giải quyết tài sản. Ở Việt Nam, đó là Công ty mua bán nợ và tài sản tồn động của doanh nghiệp (DATC) trực thuộc Bộ Tài chính, nhưng DATC không chỉ thiếu vốn, mà khung pháp lý cơ bản cho phép các công ty quản lý tài sản được chuyển nhượng và giải quyết tài sản cũng thiếu trầm trọng (chưa nói đến vấn đề chuyển nhượng cho nước ngoài). Không có cả thị trường thứ cấp cho việc mua bán khoản vay và cơ sở pháp lý cho việc chuyển nhượng tài sản thế chấp, đặc biệt là thế chấp bất động sản. Nhiều người cũng quan ngại rằng DATC thiếu một cơ cấu quản lý để đảm bảo việc lựa chọn tài sản thích hợp, thẩm định theo giá thị trường và hình thức giải quyết tài sản hợp lý để tối đa hóa giá trị thu hồi.&lt;\/p&gt;\r\n\t&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n&lt;ul style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;li&gt;\r\n\t\t&lt;strong&gt;Đ&lt;\/strong&gt;&lt;strong&gt;ị&lt;\/strong&gt;&lt;strong&gt;nh hư&lt;\/strong&gt;&lt;strong&gt;ớ&lt;\/strong&gt;&lt;strong&gt;ng lãnh đ&lt;\/strong&gt;&lt;strong&gt;ạ&lt;\/strong&gt;&lt;strong&gt;o trong vi&lt;\/strong&gt;&lt;strong&gt;ệ&lt;\/strong&gt;&lt;strong&gt;c c&lt;\/strong&gt;&lt;strong&gt;ả&lt;\/strong&gt;&lt;strong&gt;i t&lt;\/strong&gt;&lt;strong&gt;ổ&lt;\/strong&gt;&lt;strong&gt; và nh&lt;\/strong&gt;&lt;strong&gt;ữ&lt;\/strong&gt;&lt;strong&gt;ng chính sách quan tr&lt;\/strong&gt;&lt;strong&gt;ọ&lt;\/strong&gt;&lt;strong&gt;ng v&lt;\/strong&gt;&lt;strong&gt;ẫ&lt;\/strong&gt;&lt;strong&gt;n chưa rõ ràng&lt;\/strong&gt;. Với những cái tên nổi tiếng bị bắt trong cơn bão ngân hàng như Nguyễn Đức Kiên hay gần đây là việc chủ tịch Sacombank Đặng Văn Thành từ chức, có một sự bất ổn chung trong môi trường chính trị dẫn đến những cuộc điều tra cũng như lo ngại về khả năng của tầng lớp lãnh đạo trong việc đưa ra các chính sách cứng rắn về vấn đề tái cơ cấu ngân hàng.&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n&lt;ul style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;li&gt;\r\n\t\tCuối cùng, nhưng không kém phần quan trọng, những người chúng tôi gặp cũng tin là &lt;strong&gt;không có d&lt;\/strong&gt;&lt;strong&gt;ấu hiệu nào về “một cuộc khủng hoảng” để buộc các ngân hang phải tăng tốc cải tổ.&lt;\/strong&gt; Không giống như năm 1997\/98 khi cuộc khoảng hoảng về cán cân thanh toán cùng với khủng khoảng ngân hàng buộc các quốc gia Châu Á phải hành động quyết liệt hơn với các ngân hàng yếu kém của họ để phục hồi niềm tin (đồng thời tuân theo các chương trình của IMF), “khủng hoảng ngân hàng” ở Việt Nam chủ yếu là một cuộc khủng hoảng mang tính nội địa. Tín dụng ngân hàng ở Việt Nam phần lớn được xây dựng từ nguồn tiền gửi trong nước, với rất ít sự cầu viện vào các dòng vốn bên ngoài, đồng thời cũng có rất ít dòng vốn nóng (hot money) để có thể tạo ra tình trạng lượng lớn vốn đổ ra ngoài làm mất cân bằng tài chính đối ngoại và dẫn tới sự can thiệp của các chính sách. Với sự hỗ trợ của Bảo hiểm tiền gửi toàn bộ cũng như tầm quan trọng của Chính phủ đằng sau các ngân hàng, niềm tin của người gửi vào hệ thống ngân hàng vẫn ở mức cao và dường như không quan tâm đến những tin tức xấu của giới ngân hàng, kể cả vấn đề tỉ lệ nợ xấu đang gia tăng hay vấn đề thanh khoản của ACB sau khi bầu Kiên bị bắt.&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/01\/Untitled2.png&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-1326&quot; height=&quot;400&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/01\/Untitled2-1024x877.png&quot; title=&quot;Untitled&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;span style=&quot;text-align: right;&quot;&gt;&amp;nbsp;&lt;\/span&gt;&lt;\/p&gt;\r\n&lt;p style=&quot;text-align: right;&quot;&gt;\r\n\t&lt;strong&gt;Nguồn&lt;\/strong&gt;: Citi research, VCBS&lt;\/p&gt;\r\n",
      "status": true,
      "created": ISODate("2013-07-23T08:41:52.0Z"),
      "updated": ISODate("2013-08-08T17:02:33.0Z"),
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "du-doan-dien-bien-tai-cau-truc-he-thong-ngan-hang-rat-cham-51ee41d0471dee300b000000",
      "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/51ee41d0471dee300b000001\/thumb.jpg",
      "description": "Chúng tôi tin rằng, dù phát biểu thế nào trước công chúng đi nữa...\r\n",
      "category": {
        "$ref": "branch_category",
        "$id": ObjectId("51d3d0c0d874591406000001"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("51ee410b471dee200b000001"),
      "title": "Marc Faber: Việt Nam sẽ là một trong những TTCK tốt nhất 2013",
      "content": "&lt;p&gt;\r\n\tMarc Faber, người dự báo chính xác sự sụp đổ của thị trường chứng khoán 1987, cho rằng dòng tiền sẽ đổ mạnh vào Việt Nam, Trung Quốc, Nhật Bản trong 2013.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tTrong cuộc phỏng vấn hôm 9\/1 vừa qua với hãng tin CNBC, chuyên gia phân tích tài chính Marc Faber (người đã dự báo chính xác về sự sụp đổ tất yếu của thị trường chứng khoán năm 1987) cho rằng, Việt Nam, Trung Quốc, Nhật Bản và Ukraine sẽ là các thị trường chứng khoán tốt nhất năm 2013.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tTrong khi đó, ông nhấn mạnh, năm 2013 lại không phải là năm thuận lợi cho các thị trường vốn tăng trưởng khá tốt sau tháng 3\/2009 như Malaysia, Indonesia, Philippines và Thái Lan.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tFaber cho rằng, nhà đầu tư sẽ hướng đến các thị trường nhiều biến động thời gian qua như Việt Nam, Trung Quốc và Nhật Bản. Hay nói cách khác, dòng tiền sẽ dịch chuyển từ các thị trường từng được đánh giá cao sang các thị trường trước đó tồi tệ, đặc biệt là Nhật Bản và Ukraine.&lt;\/p&gt;\r\n&lt;div&gt;\r\n\tThời gian gần đây, thị trường chứng khoán Việt Nam luôn nhận được sự đánh giá cao của chuyên gia. Thời báo phố Wall nhận định, thị trường chứng khoán Việt Nam là ngôi sao châu Á năm 2012, trong khi theo Bloomberg, Việt Nam sẽ là thị trường tăng trưởng tốt nhất thế giới năm 2013.\r\n\t&lt;p&gt;\r\n\t\tTổng giám đốc kiêm Giám đốc điều hành công ty quản lý quỹ Manulife tại TPHCM, bà Nguyễn Vũ Ngọc Trinh nhận định: “Chúng tôi rất vui khi Chính phủ cam kết ổn định kinh tế, đó là điều chúng tôi sẽ tiếp tục chứng kiến trong năm 2013”. Manulife hiện đang quản lý số tài sản lên đến 300 triệu USD tại Việt Nam. Quỹ này đã tăng nắm giữ cổ phiếu Việt Nam trong những tuần gần đây.&lt;\/p&gt;\r\n\t&lt;p&gt;\r\n\t\tTrưởng bộ phận nghiên cứu tại Công ty Chứng khoán TPHCM (HSC), ông Fiachra Mac Cana, cho biết, những tuần gần đây, các nhà đầu tư đã “đổ xô gom cổ phiếu” Việt Nam. Lượng giao dịch trung bình mỗi ngày kể từ đầu năm nay khoảng 100 triệu USD, gần gấp 3 lần nửa sau năm 2012. Tuy nhiên, ông MacCana cũng cho rằng, chứng khoán Việt Nam có thể giảm trong một thời gian ngắn sau khi tăng 20%.&lt;\/p&gt;\r\n\t&lt;p&gt;\r\n\t\tĐến nay, nhà đầu tư nước ngoài mua ròng trên sàn chứng khoán Việt Nam 6 tháng liên tiếp. Kể từ đầu năm, khối ngoại mua ròng 51 triệu USD cổ phiếu, cao hơn 2 lần so với cùng kỳ 2012, trong đó riêng sàn HSX là 42 triệu USD. Hiện có 314 mã cổ phiếu niêm yết trên HSX với tổng giá trị vốn hóa khoảng 34 tỷ USD.&lt;\/p&gt;\r\n&lt;\/div&gt;\r\n&lt;address&gt;\r\n\tNguồn Gafin&lt;\/address&gt;\r\n",
      "status": true,
      "created": ISODate("2013-07-23T08:38:35.0Z"),
      "updated": ISODate("2013-08-08T17:02:35.0Z"),
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "marc-faber-viet-nam-se-la-mot-trong-nhung-ttck-tot-nhat-2013-51ee410b471dee200b000000",
      "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/51ee410b471dee200b000001\/thumb.jpg",
      "description": "Marc Faber, người dự báo chính xác sự sụp đổ của thị trường chứng khoán.\r\n",
      "category": {
        "$ref": "branch_category",
        "$id": ObjectId("51d3d0d6d874591406000002"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("51ee3492471dee400b000001"),
      "title": "Lăng kính Yestoc phiên 22\/07: ” Hạn chế mua đuổi”",
      "content": "&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tThị trường tiếp tục diễn biến phân hóa rõ rệt khi mà dòng tiền chưa có sự lan tỏa rộng, diễn biến tích cực của nhóm cổ phiếu largecap trong phiên đầu tuần vẫn đang là động lực chính giúp chỉ số Vnindex vận động tích cực hơn. Trong khi đó, chỉ số Hnxindex vẫn đang trong giai đoạn tích lũy dưới ngưỡng cản 63.5 với thanh khoản thấp, cho thấy những phiên tăng vừa qua trên Vnindex chưa thật sự bền vững. Như trong các bản tin trước, chúng tôi đánh giá ngưỡng 507-510 sẽ đóng vai trò kháng cự mạnh khi Vnindex tiếp tục tăng trong những phiên tới, do đó nhà đầu tư cần thận trọng khi Vnindex tiến về vùng này.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/07\/vnindex2.png&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-3151&quot; height=&quot;452&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/07\/vnindex2-1024x452.png&quot; style=&quot;border: 1px solid black;&quot; title=&quot;vnindex&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Chiến lược trade ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;ul&gt;\r\n\t&lt;li&gt;\r\n\t\tTheo quan điểm của chúng tôi, nhà đầu tư có thể tiếp tục duy trì&amp;nbsp;trạng thái nắm giữ với danh mục đã mua trong những phiên trước.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tHạn chế mua đuổi khi Vnindex tăng lên vùng kháng cự 507-510. Chúng tôi sẽ cập nhật tín hiệu bán nếu Vnindex tạo đỉnh ở vùng này.&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n",
      "status": true,
      "created": ISODate("2013-07-23T07:45:22.0Z"),
      "updated": ISODate("2013-08-08T17:02:38.0Z"),
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "lang-kinh-yestoc-phien-2207-han-che-mua-duoi-51ee3492471dee400b000000",
      "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/51ee3492471dee400b000001\/thumb.jpg",
      "description": "Quan điểm kĩ thuật ngắn hạn: Thị trường tiếp tục diễn biến phân hóa rõ rệt.\r\n",
      "category": {
        "$ref": "branch_category",
        "$id": ObjectId("51d3ceced874596804000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("51ea5a44471dee1c0a000005"),
      "title": "Lăng kính Yestoc 31\/05: “chúng tôi vẫn duy trì quan điểm thận trọng”",
      "content": "&lt;p&gt;\r\n\t&lt;strong&gt;Vùng hỗ trợ để tiếp tục xu hướng tăng ngắn hạn: 490. &amp;nbsp;Thủng vùng này không mua thêm, chờ xác định rõ xu hướng , nếu kéo lên lại vượt 498 mới mua, chỉ mua ngắn hạn, ưu tiên cổ phiếu có sẵn, mua thấp bán cao, lên chạm kháng cự &amp;nbsp;512.5 \/ 530thấy yếu nên bán ra chốt lãi phần mua thêm sau. Vùng 530 thấy phân phối vol mạnh cao đột biến nên bán chốt danh mục giữ tiền mặt; nếu duy trì vol tốt ổn định có nhiều thông tin tốt hỗ trợ nên giữ chờ vượt 530 có thể tăng thêm lượng cổ phiếu, kỳ vọng 550.&lt;\/strong&gt;&lt;\/p&gt;\r\n",
      "status": true,
      "created": ISODate("2013-07-20T09:37:08.0Z"),
      "updated": ISODate("2013-08-08T17:02:26.0Z"),
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "lang-kinh-yestoc-3105-chung-toi-van-duy-tri-quan-diem-than-trong-51ea5a44471dee1c0a000004",
      "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/51ea5a44471dee1c0a000005\/thumb.png",
      "description": "Vượt 498 khả năng tăng ngắn hạn lên 512.5. kháng cự cao hơn là 530.\r\n",
      "category": {
        "$ref": "branch_category",
        "$id": ObjectId("51d3ceced874596804000000"),
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
db.getCollection("branch_category").insert({
  "_id": ObjectId("51f654df471deeb40c000000"),
  "name": "abc",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39bb1d87459c40a000018"),
    "$db": "yesocl"
  },
  "order": NumberInt(0)
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
db.getCollection("design_layout").insert({
  "_id": ObjectId("51ebd206471deec80a000000"),
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
  "name": "Post of User",
  "path": "user\/post"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("51fe1a9b471dee0c0b000000"),
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
  "name": "Comment of Branch",
  "path": "branch\/comment"
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
  "_id": ObjectId("51fd28e0471dee8c09000000"),
  "created": ISODate("2013-08-03T15:59:28.0Z"),
  "emails": [
    {
      "_id": ObjectId("51fd28e0471dee8c09000002"),
      "email": "user10@test.com",
      "primary": true
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("516b4a91913db43009000000"),
    "$db": "yesocl"
  },
  "meta": {
    "_id": ObjectId("51fd28e0471dee8c09000001"),
    "firstname": "Bommer",
    "lastname": "Luu",
    "birthday": ISODate("2010-02-02T23:00:00.0Z"),
    "sex": NumberInt(2)
  },
  "password": "2506f7b2e174d2ab3c62b52cbfed080ca89510b3",
  "salt": "d95e517f4",
  "slug": "user-temp",
  "status": true
});
db.getCollection("user").insert({
  "_id": ObjectId("518f5f43471deeb40900001f"),
  "created": ISODate("2013-05-12T09:22:11.0Z"),
  "emails": [
    {
      "_id": ObjectId("51ffcbc8471deeb009000013"),
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
    "_id": ObjectId("51ffcbc8471deeb00900000a"),
    "firstname": "user2",
    "lastname": "yesocl",
    "birthday": ISODate("2013-08-05T15:59:04.0Z"),
    "sex": NumberInt(1),
    "headingLine": "Unum falli aperiri id pro. Ex impetus invenire eam.",
    "location": {
      "_id": ObjectId("51ffcbc8471deeb00900000b"),
      "location": "HCM, Việt Nam",
      "cityId": "5143bfca913db4a408000012"
    },
    "postalCode": "84",
    "industry": "Chemicals",
    "industry_id": "514b0970913db4ac08000020",
    "address": "129\/6\/5 Lê Văn Thọ F11 Gò Vấp",
    "ims": [
      {
        "_id": ObjectId("51ffcbc8471deeb00900000c"),
        "im": "user2",
        "type": "skype",
        "visible": "myfollow"
      }
    ],
    "phones": [
      {
        "_id": ObjectId("51ffcbc8471deeb00900000d"),
        "phone": "0904000444",
        "type": "mobile",
        "visible": "myfollow"
      }
    ],
    "websites": [
      {
        "_id": ObjectId("51ffcbc8471deeb00900000e"),
        "url": "www.yesocl.com",
        "title": ""
      }
    ],
    "background": {
      "_id": ObjectId("51ffcbc8471deeb00900000f"),
      "experiencies": [
        {
          "_id": ObjectId("51ffcbc8471deeb009000010"),
          "company": "Yesocl",
          "title": "My Company",
          "location": {
            "_id": ObjectId("51ffcbc8471deeb009000011"),
            "location": "HCM, Việt Nam",
            "cityId": "5143bfca913db4a408000012"
          },
          "started": ISODate("2013-01-01T16:59:04.0Z"),
          "ended": ISODate("2013-01-01T16:59:04.0Z"),
          "current": false,
          "description": "Sed et utamur argumentum. Eum an habeo ubique efficiantur. Eu sea oporteat vituperatoribus, eos in graecis delicata persecuti. Mel an summo dicit eleifend. Copiosae quaestio mandamus vim et."
        }
      ],
      "educations": [
        {
          "_id": ObjectId("51ffcbc8471deeb009000012"),
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
  "posts": [
    
  ],
  "salt": "dc1668c45",
  "slug": "user2",
  "status": true,
  "username": "user2"
});
db.getCollection("user").insert({
  "_id": ObjectId("518f5555471deea409000000"),
  "created": ISODate("2013-05-12T08:39:48.0Z"),
  "emails": [
    {
      "_id": ObjectId("520122e6471dee380a000009"),
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
    "_id": ObjectId("520122e5471dee380a000000"),
    "firstname": "Bommer",
    "lastname": "Luu",
    "birthday": ISODate("2013-08-06T16:23:01.0Z"),
    "sex": NumberInt(1),
    "headingLine": "",
    "location": {
      "_id": ObjectId("520122e5471dee380a000001"),
      "location": "HCM, Việt Nam",
      "cityId": "5143bfca913db4a408000012"
    },
    "postalCode": "84",
    "industry": "Chemicals",
    "industry_id": "514b0970913db4ac08000020",
    "address": "129\/6\/5 Lê Văn Thọ F11 Gò Vấp",
    "ims": [
      {
        "_id": ObjectId("520122e5471dee380a000002"),
        "im": "user1",
        "type": "skype",
        "visible": "myfollow"
      }
    ],
    "phones": [
      {
        "_id": ObjectId("520122e5471dee380a000003"),
        "phone": "0903000333",
        "type": "mobile",
        "visible": "myfollow"
      }
    ],
    "websites": [
      {
        "_id": ObjectId("520122e5471dee380a000004"),
        "url": "www.yesocl.com",
        "title": ""
      }
    ],
    "background": {
      "_id": ObjectId("520122e5471dee380a000005"),
      "experiencies": [
        {
          "_id": ObjectId("520122e5471dee380a000006"),
          "company": "Yesocl",
          "title": "My Company",
          "location": {
            "_id": ObjectId("520122e5471dee380a000007"),
            "location": "HCM, Việt Nam",
            "cityId": "5143bfca913db4a408000012"
          },
          "started": ISODate("2013-01-01T17:23:01.0Z"),
          "ended": ISODate("2013-01-01T17:23:01.0Z"),
          "current": false,
          "description": "Lorem ipsum dolor sit amet, nec in corpora dignissim, nam ea agam zril electram, aperiam vulputate eam ne. Id scaevola mandamus delicatissimi mel, ei prompta nusquam nec. At ferri ridens nam, quo reque expetendis contentiones ut. Mazim aperiri te per, cum adhuc summo in."
        }
      ],
      "educations": [
        {
          "_id": ObjectId("520122e5471dee380a000008"),
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
  "posts": [
    {
      "_id": ObjectId("51eeb4aa471dee2c0b000004"),
      "author": "user1",
      "content": "&lt;p&gt;\r\n\t&lt;strong&gt;&lt;span style=&quot;text-decoration: underline;&quot;&gt;Vnindex:&lt;\/span&gt;&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Phiên 18\/6 đóng cửa hồi phục nhẹ=&amp;gt; tín hiệu tích cực trong ngắn hạn.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Vùng hỗ trợ: trendlin 485-490 đ. Thủng vùng này, ngưỡng hỗ trợ gần nhất là 462-468.5 đ&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Trường hợp không thủng 485-490. Để xác nhận lại xu hướng tăng, thị trường cần vượt qua ngưỡng cản 515 – 517.5 đ.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;strong&gt;&lt;span style=&quot;text-decoration: underline;&quot;&gt;Chiến lược:&lt;\/span&gt;&lt;\/strong&gt; dừng bán đuổi ( trừ trường hợp thủng 485 =&amp;gt; bắt buộc bán cắt lỗ). Những phiên tới thị trường hồi phục lên vùng 505-511 đ canh bán bớt giãm tỷ trọng cổ phiếu về mức an toàn đặc biệt đối với những mã tăng nóng thời gian qua cần bán hết thanh lý danh mục, nếu thị trường vượt 515-517.5 đ có thể cơ cấu sang những mã tốt chưa tăng nhiều.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;strong&gt;&lt;span style=&quot;text-decoration: underline;&quot;&gt;Danh mục:&lt;\/span&gt;&lt;\/strong&gt; VNM, BMP, PVD, KHP, HLD, GAS, LIX&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/06\/vnindex-19.png&quot; rel=&quot;attachment wp-att-2937&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignnone  wp-image-2937&quot; height=&quot;377&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/06\/vnindex-19.png&quot; title=&quot;huynh khac  minh - vnindex - yestoc - smart_money&quot; width=&quot;605&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t———————————-&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tHuỳnh Khắc Minh&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tYahoo: business_hkm&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tEmail: minh.hk83@gmail.com&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tSkype: minh.trang02&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tHp: 0916 31 8868&lt;\/p&gt;\r\n",
      "created": ISODate("2013-07-23T16:51:54.0Z"),
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "thumb": "data\/catalog\/user\/518f5555471deea409000000\/post\/51eeb4aa471dee2c0b000004\/avatar.jpg",
      "title": "Phân tích, nhận định thị trường trước phiên giao dịch 19\/06\/2013",
      "updated": ISODate("2013-07-24T08:24:07.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "salt": "09b2a07c9",
  "slug": "user1",
  "status": true,
  "username": "user1"
});

/** user_group records **/
db.getCollection("user_group").insert({
  "_id": ObjectId("516b4a91913db43009000000"),
  "name": "Default"
});

/** ward records **/
