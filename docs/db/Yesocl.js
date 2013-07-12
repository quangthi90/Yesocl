
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
      "_id": ObjectId("51e018c8471dee280a000000"),
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
      "_id": ObjectId("51e018c8471dee280a000001"),
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
      "_id": ObjectId("51e018c8471dee280a000002"),
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
      "_id": ObjectId("51e018c8471dee280a000003"),
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
      "_id": ObjectId("51e018c8471dee280a000004"),
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
      "_id": ObjectId("51e018c8471dee280a000005"),
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
      "_id": ObjectId("51e018c8471dee280a000006"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("516aac38913db4a004000000"),
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
      "_id": ObjectId("51e018c8471dee280a000007"),
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
      "_id": ObjectId("51e018c8471dee280a000008"),
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
      "_id": ObjectId("51e018c8471dee280a000009"),
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
      "_id": ObjectId("51e018c8471dee280a00000a"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("516c974b976982740a000000"),
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
      "_id": ObjectId("51e018c8471dee280a00000b"),
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
      "_id": ObjectId("51e018c8471dee280a00000c"),
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
      "_id": ObjectId("51e018c8471dee280a00000d"),
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
      "_id": ObjectId("51e018c8471dee280a00000e"),
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
      "_id": ObjectId("51e018c8471dee280a00000f"),
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
      "_id": ObjectId("51e018c8471dee280a000010"),
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
      "_id": ObjectId("51e018c8471dee280a000011"),
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
      "_id": ObjectId("51e018c8471dee280a000012"),
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
      "_id": ObjectId("51e018c8471dee280a000013"),
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
      "_id": ObjectId("51e018c8471dee280a000014"),
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
      "_id": ObjectId("51e018c8471dee280a000015"),
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
      "_id": ObjectId("51e018c8471dee280a000016"),
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
      "_id": ObjectId("51e018c8471dee280a000017"),
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
      "_id": ObjectId("51e018c8471dee280a000018"),
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
      "_id": ObjectId("51e018c8471dee280a000019"),
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
  "_id": ObjectId("51d39ba5d87459c40a000017"),
  "name": "Stockin",
  "status": true,
  "company": {
    "$ref": "company",
    "$id": ObjectId("519d1163471deee40b000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch").insert({
  "_id": ObjectId("51d39bb1d87459c40a000018"),
  "name": "Food",
  "status": true,
  "company": {
    "$ref": "company",
    "$id": ObjectId("519d1163471deee40b000000"),
    "$db": "yesocl"
  }
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
  "_id": ObjectId("519d1163471deee40b000000"),
  "created": ISODate("2013-05-25T22:00:00.0Z"),
  "description": "<p>\r\n\tLorem ipsum dolor sit amet, enim corrumpit eos in, usu ex dicant pertinax, primis latine ad nam. Soleat delectus euripidis cum in, quo lorem feugiat mandamus eu.<\/p>\r\n",
  "group": {
    "$ref": "company_group",
    "$id": ObjectId("516b9417913db47809000003"),
    "$db": "yesocl"
  },
  "logo": "data\/catalog\/company\/519d1163471deee40b000000\/logo.png",
  "name": "Yesocl",
  "owner": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  },
  "posts": [
    {
      "_id": ObjectId("51aa52c2471dee980a00001d"),
      "title": "Lăng kính Yestoc 31\/05: “chúng tôi vẫn duy trì quan điểm thận trọng”",
      "content": "&lt;p&gt;\r\n\t&lt;strong&gt;Tin Nhanh Thế Giới&lt;\/strong&gt;&lt;strong&gt;-&lt;\/strong&gt;Tăng trưởng kinh tế Mỹ đạt 2.4%, thấp hơn so với dự báo ban đầu do xây dựng và hàng tồn kho vẫn ở mức cao. Bên cạnh đó, các chính sách thắt chặt chi tiêu của chính phủ đã cản trở sự tăng trưởng tiêu dùng đang ở mức cao nhất từ 2010.-Dự báo tăng trưởng kinh tế Anh từ đến năm 2015 có khả năng nhanh hơn dự báo ban đầu. Các số liệu cho thấy niềm tin tiêu dùng có sự gia tăng lên mức cao nhất sáu tháng trong tháng năm.- Thị trường chứng khoán Châu Á nói chung cũng như Chứng khoán Nhật Bản nói riêng đã có phiên gia tăng tích cực sau phiên sụt giảm mạnh trước đó cùng &amp;nbsp;nỗ lực cải cách các chính sách kinh doanh cũng như duy trì niềm tin tăng trưởng.&lt;strong&gt;Tin Nhanh Trong Nước &lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;- &lt;\/strong&gt;Tại phiên thảo luận của Quốc hội chiều 30\/5, Thống đốc Ngân hàng Nhà nước (NHNN) cho biết, dự kiến trong năm nay sẽ giải ngân được khoảng 15-20 nghìn tỷ đồng gói 30 nghìn tỷ đồng hỗ trợ cho thị trường bất động sản.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t- Bộ Kế hoạch Đầu tư đang dự thảo Chỉ thị của Thủ tướng về xây dựng Kế hoạch phát triển kinh tế-xã hội và Dự toán ngân sách Nhà nước 2014. Theo đó sẽ&amp;nbsp; Bộ sẽ đề xuất mục tiêu tăng trưởng GDP 2014 khoảng 6%&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;- &lt;\/strong&gt;Petrolimex chính thức phản hồi thông tin thua lỗ lớn&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t- Sáng nay, giá cà phê nhân xô các tỉnh Tây Nguyên đồng loạt giảm 100 nghìn đồng xuống 40,3-40,5 triệu đồng tấn&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Tin Nhanh Cổ Phiếu :&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t- KAC: Thành viên thứ 2 của HĐQT từ nhiệm trong vòng 1 tháng.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t- 6 tháng đầu năm 2013, PVD ước đạt hơn 800 tỷ đồng LNST.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t- REE : TMP mở đường cho REE nhận chuyển nhượng 16 triệu CP từ EVN Finance&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t- DHG: Hai quỹ ngoại chuyển quyền sở hữu hơn 430 nghìn cổ phiếu cho 2 quỹ ngoại khác&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Diễn Biến Thị Trường :&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tThị trưởng tiếp tục có một phiên gia tăng khá tích cực. Mặc dù quá trình điều chỉnh đầu phiên khá mạnh mẽ tạo tâm lý hoang mang khá lớn tới thị trường. Tuy nhiên sau đó, các lệnh mua vào xuất hiện khá lớn đã nâng đỡ thị trường gia tăng trở lại. Cổ phiếu REE có sự gia tăng mạnh mẽ 6.4%, đóng cửa ở mức 28,400 đ\/cp. PVD cũng gia tăng mạnh mẽ 1,600 lên 49,500 đ\/cp. SHB tiếp tục biến động ở biên độ hẹp, gia tăng nhẹ 100 đ\/cp lên7,600 đ\/cp, tương ứng mức tăng 1.3%.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Lăng Kính&amp;nbsp; Phân Tích Kỹ Thuật :&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điềm phân tích ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tVề mặt phân tích kỹ thuật, hai chỉ số VNIndex và HNX đều vượt các ngưỡng kháng cự quan trọng là 518 và 65 . Tuy nhiên, mức vượt qua khá nhỏ và thanh khoản sụt giảm khá mạnh so với phiên trước nên chúng tôi vẫn duy trì quan điểm thận trọng. Trong ngắn hạn, chỉ báo xung lượng RSI 14 ngày cũng đã đi vào vùng quá mua, cho thấy khả năng thị trường điều chỉnh giảm. Ở tình huống &amp;nbsp;tích cực, nếu đà tăng được giữ vững, VN-Index sẽ tăng 1 nhịp vùng kháng cự 530, trong khi đó HNX-Index có thể quay về đỉnh 67. Trường hợp ngược lại, Vnidnex sẽ điều chinh về vùng 500-505, và HNX điều chỉnh về 61.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/vnindex12.jpg&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-2725&quot; height=&quot;400&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/vnindex12-1024x453.jpg&quot; style=&quot;border: 1px solid black;&quot; title=&quot;vnindex&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/hnxindex6.jpg&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-2726&quot; height=&quot;400&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/hnxindex6-1024x453.jpg&quot; style=&quot;border: 1px solid black;&quot; title=&quot;hnxindex&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Chiến lược giao dịch ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;ul&gt;\r\n\t&lt;li&gt;\r\n\t\tChúng tôi vẩn bảo lưu quan điểm thận trọng, nhà đầu tư lướt sóng có thể chủ động chốt lời một phần danh mục cổ phiếu để&amp;nbsp;hiện thực hóa lợi nhuận và tái cơ cấu danh mục đầu tư.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tVới nhà đầu tư đang cầm tiền, việc mua đuổi trong giai đoạn này là không cần thiết, có thể canh các nhịp điều chỉnh trong phiên và chỉ nên giải ngân với một tỉ lệ thấp, và chờ đợi nhịp điều chỉnh lớn hơn để cơ cấu toàn bộ danh mục.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tĐịnh dạng .pdf&amp;nbsp;&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/YS_daily_report_31.05.2013.pdf&quot;&gt;YS_daily_report_31.05.2013&lt;\/a&gt;&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n",
      "status": true,
      "created": ISODate("2013-06-01T20:00:02.0Z"),
      "author": "user1",
      "email": "user1@test.com",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "lang-kinh-yestoc-3105-chung-toi-van-duy-tri-quan-diem-than-trong-51aa52c2471dee980a00001c",
      "category": {
        "$ref": "company_post_category",
        "$id": ObjectId("516c9640976982b00c000000"),
        "$db": "yesocl"
      },
      "description": "&lt;p&gt;\r\n\tTin Nhanh Thế Giới-Tăng trưởng kinh tế Mỹ đạt 2.4%, thấp hơn so với dự báo ban đầu do xây dựng và hàng tồn kho vẫn ở mức cao.&lt;\/p&gt;\r\n"
    },
    {
      "_id": ObjectId("51a79d10471dee9c09000005"),
      "title": "Lăng kính Yestoc phiên 30\/05: “áp lực bán có thể sẽ gia tăng”",
      "content": "&lt;p&gt;\r\n\tDòng tiền đầu cơ tiếp tục đổ vào thị trường sau những diễn biến tích cực, cùng với đó tâm lý của nhà đầu tư cũng ổn định hơn tại một số thời điểm thị trường điều chỉnh khi không xuất hiện áp lực bán tháo. Tuy nhiên,&amp;nbsp;áp lực chốt lời đã nhanh chóng gia tăng trở lại khiến thị trường mất dần sự hưng phấn. Lực bán &amp;nbsp;tập trung chủ yếu ở nhóm cổ phiếu lớn và &amp;nbsp;đầu cơ, những cổ phiếu đã có mức tăng trưởng mạnh trong thời gian qua như REE, PPC, DRC, VNM, GAS…&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm ngắn hạn (5-10 ngày):&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tVề mặt kỹ thuật, Vnindex hình thành hai cây nến gần đây luôn tạo bóng trên ở ngưỡng 518 cho thấy lực bán khá mạnh tập trung &amp;nbsp;ở vùng này và theo đó, nhịp điều chỉnh sắp tới có thể xảy ra đưa VNIndex về vùng hỗ trợ 500-505 điểm. Trong khi đó, chỉ số&amp;nbsp;HNXIndex cũng yếu dần về cuối phiên cho thấy dấu hiệu tiêu cực với việc hình thành mô hình nến Shooting Star cùng khối lượng giao dịch lớn.&amp;nbsp;Tương ứng với mức 500 điểm của VNIndex, mục tiêu của HNX là vùng hỗ trợ &amp;nbsp;63-62.5.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/vnindex11.jpg&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-2718&quot; height=&quot;400&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/vnindex11-1024x453.jpg&quot; style=&quot;border: 1px solid black;&quot; title=&quot;vnindex&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/hnxindfex.jpg&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-2719&quot; height=&quot;400&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/hnxindfex-1024x453.jpg&quot; style=&quot;border: 1px solid black;&quot; title=&quot;hnxindfex&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Chiến lược giao dịch ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;ul&gt;\r\n\t&lt;li&gt;\r\n\t\tỞ vị thế mua, chúng&amp;nbsp;tôi không ủng hộ việc mua đuổi trong phiên (đặc việt là nhóm cổ phiếu đã tăng mạnh)&amp;nbsp;&amp;nbsp;mà nên cân nhắc mua vào ở các nhịp điều chỉnh về vùng hỗ trợ trong phiên cuối tuần.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tDanh mục giải ngân có thể tập trung vào các cổ phiếu đang tích lũy hoặc chưa tăng mạnh trong thời gian qua.&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n",
      "status": true,
      "created": ISODate("2013-05-30T18:40:16.0Z"),
      "updated": ISODate("2013-05-31T16:22:11.0Z"),
      "author": "user2",
      "email": "user2@test.com",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      },
      "comments": [
        {
          "_id": ObjectId("51a79e5f471dee9c09000006"),
          "content": "&lt;p&gt;\r\n\tBài viết rất hay, cố gắng phát huy nha ^^&lt;\/p&gt;\r\n",
          "status": true,
          "created": ISODate("2013-05-30T18:45:51.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("518f5555471deea409000000"),
            "$db": "yesocl"
          },
          "author": "user1",
          "email": "user1@test.com"
        },
        {
          "_id": ObjectId("51a8bdb8471dee0c09000000"),
          "content": "Bài viết này cũng bình thường thôi... hehe...",
          "status": true,
          "created": ISODate("2013-05-31T15:11:52.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("518f5555471deea409000000"),
            "$db": "yesocl"
          },
          "author": "user1",
          "email": "user1@test.com"
        },
        {
          "_id": ObjectId("51a8ce33471dee0c09000001"),
          "content": "Bài viết này thấy cũng bình thường mà... có j` đâu mà hay nhẩy @_@",
          "status": true,
          "created": ISODate("2013-05-31T16:22:11.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("518f5555471deea409000000"),
            "$db": "yesocl"
          },
          "author": "user1",
          "email": "user1@test.com"
        }
      ],
      "slug": "lang-kinh-yestoc-phien-3005-ap-luc-ban-co-the-se-gia-tang-51a79d10471dee9c09000004",
      "category": {
        "$ref": "company_post_category",
        "$id": ObjectId("516c9640976982b00c000000"),
        "$db": "yesocl"
      },
      "description": "&lt;p&gt;\r\n\tDòng tiền đầu cơ tiếp tục đổ vào thị trường sau những diễn biến tích cực&lt;\/p&gt;\r\n",
      "thumb": "data\/catalog\/company\/519d1163471deee40b000000\/post\/51a79d10471dee9c09000005\/thumb.jpg"
    },
    {
      "_id": ObjectId("51a8b58d471dee2809000001"),
      "title": "Lăng kính Yestoc tuần 27-31\/05: ” Tạm thời đi ngang và điều chỉnh trong tuần”",
      "content": "&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n\tHiện tại, 2 chỉ số đang tiếp cận các vùng kháng cự 505-510 và 62,5-63 , điều này được thể hiện rõ nét trong các phiên cuối tuần, tuy nhiên, thanh khoản giao dịch vẫn duy trì được ở mức cao.&amp;nbsp;Nhìn chung, diễn&amp;nbsp;biến trong thị trường trong tuần vừa qua rất tích cực khi VNIndex vượt vùng cản 490 , HNX vượt vùng cản 61 như chúng tôi đã dự đoán.&amp;nbsp;Các cổ phiếu midcap vẫn đang là điểm đến của dòng tiền thông minh, cùng với đó là một bộ phận nhà đầu tư đã bắt đầu mua vào nhóm cổ phiếu đầu cơ với kỳ vọng về một nhịp tăng trưởng mới của chỉ số.&lt;\/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;strong&gt;Quan điểm ngắn hạn ( 5-10 ngày):&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n\tNhững cây nến xanh biên độ lớn xuất hiện ngày càng nhiều cho thấy tâm lý nhà đầu tư được cải thiện theo chiều hướng tích cực khi giá đã phá vỡ hoàn toàn vùng kháng cự mạnh 490. Tuy nhiên, về cuối tuần áp lực chốt lời càng mạnh khiến thị trường điều chỉnh nhẹ. Việc rung lắc trong phiên dự đoán sẽ còn xuất hiện trong thời gian tới khi cả hai chỉ số vừa phá vỡ ngưỡng kháng cự quan trọng.&amp;nbsp;Kịch bản nhiều khả năng nhất là thị trường sẽ tạm thời dao động trong khung 491-510 trên Vnindex và 61-63 trên Hnx. Với kịch bản dao động như vậy thì nhà đầu tư vẫn có thể cân nhắc mua vào tại các thời điểm điều chỉnh của thị trường.&lt;\/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;strong&gt;Quan điểm trung hạn (1 – 3 tháng):&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\tTheo đồ thị tuần, xu hướng trung hạn đang trong giai đoạn xác nhận xu hướng tăng và cần phải quan sát thêm. Nếu mức độ điều chỉnh không quá mạnh dưới mức 491 của chỉ số VNIndex và mức 61.0 của chỉ số HNX trong những phiên tới cũng như thanh khoản tiếp tục duy trì tăng ồn định thì việc mua tích lũy có thể được cân nhắc.&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;strong&gt;Chiến lược trade ngắn hạn:&lt;\/strong&gt;&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;ul&gt;\r\n\t\t&lt;li&gt;\r\n\t\t\tNhà đầu tư tránh mua đuổi giá cao (nếu có) trong phiên đầu tuần, đặc biệt là trong các phiên hồi phục mạnh khi chỉ số tiệm cận các ngưỡng cản trung và dài hạn.&lt;\/li&gt;\r\n\t\t&lt;li&gt;\r\n\t\t\tThị trường sẽ sớm chịu áp lực điều chỉnh tại vùng 500-510 và 62.5, do đó&amp;nbsp;nhà đầu tư có thể xem xét gia tăng tỷ lệ nắm giữ cổ phiếu khi thị trường điều chỉnh giảm tại mốc hỗ trợ.&lt;\/li&gt;\r\n\t\t&lt;li&gt;\r\n\t\t\tĐiểm cắt lỗ có thể cân nhắc đặt tại vùng 491 và 59, tương ứng cho VNIndex và HNX nếu thị trường giảm mạnh.&lt;\/li&gt;\r\n\t\t&lt;li&gt;\r\n\t\t\tDanh mục tập trung vào các mã lực cầu mạnh như :&lt;\/li&gt;\r\n\t&lt;\/ul&gt;\r\n\t&lt;ol&gt;\r\n\t\t&lt;li&gt;\r\n\t\t\tCổ&amp;nbsp;phiếu cơ bản : PVC, CSM, PVD, FPT,&amp;nbsp;REE, DRC, PET, VSH, GAS, VNM&lt;\/li&gt;\r\n\t\t&lt;li&gt;\r\n\t\t\tCổ&amp;nbsp;phiếu đầu cơ: SHB, KLS, SCR, SSI, VND, TPP, IJC, TDC&lt;\/li&gt;\r\n\t&lt;\/ol&gt;\r\n\t&lt;p&gt;\r\n\t\t&lt;strong&gt;Một vài mã tiêu biểu:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;strong&gt;CSM__Mua: 35-37__Bán: 40__Cutloss: &amp;lt;34&lt;\/strong&gt;&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/csm.jpg&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-2660&quot; height=&quot;400&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/csm-1024x453.jpg&quot; style=&quot;border: 1px solid black;&quot; title=&quot;csm&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;strong&gt;PVD__Mua: 43-45__Bán:&amp;nbsp;&lt;strong&gt;50__Cutloss: &amp;lt;43&lt;\/strong&gt;&lt;\/strong&gt;&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/pvd.jpg&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-2663&quot; height=&quot;400&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/pvd-1024x453.jpg&quot; style=&quot;border: 1px solid black;&quot; title=&quot;pvd&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;strong&gt;VIC__Mua: 64-65__Bán: 7&lt;\/strong&gt;&lt;strong&gt;0__Cutloss: &amp;lt;63&lt;\/strong&gt;&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;strong&gt;&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/VIC.jpg&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-2665&quot; height=&quot;400&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/VIC-1024x453.jpg&quot; style=&quot;border: 1px solid black;&quot; title=&quot;VIC&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/strong&gt;&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;strong&gt;SHB__Mua: 7.0-7.2__Bán: 7.7-8__Cutloss: &amp;lt;7&lt;\/strong&gt;&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/shb.jpg&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;wp-image-2664&quot; height=&quot;400&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/shb-1024x453.jpg&quot; style=&quot;border: 1px solid black;&quot; title=&quot;shb&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/div&gt;\r\n",
      "status": true,
      "created": ISODate("2013-05-29T14:37:01.0Z"),
      "updated": ISODate("2013-06-01T18:20:12.0Z"),
      "author": "user1",
      "email": "user1@test.com",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "comments": [
        {
          "_id": ObjectId("51a8c668471dee2809000002"),
          "content": "Bài viết này rất hay, thông tin rất bổ ích, đúng những thứ mình đang cần, thanks chủ topic phát nha :x",
          "status": true,
          "created": ISODate("2013-05-31T15:48:56.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("518f5555471deea409000000"),
            "$db": "yesocl"
          },
          "author": "user1",
          "email": "user1@test.com"
        },
        {
          "_id": ObjectId("51aa3b20471dee540a000000"),
          "content": "Hay quá... ủng hộ bài viết mới nào ;)",
          "status": true,
          "created": ISODate("2013-06-01T18:19:12.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("518f5555471deea409000000"),
            "$db": "yesocl"
          },
          "author": "user1",
          "email": "user1@test.com"
        },
        {
          "_id": ObjectId("51aa3b5c471dee540a000001"),
          "content": "Hay quá... ủng hộ bài viết mới nào ;)",
          "status": true,
          "created": ISODate("2013-06-01T18:20:12.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("518f5555471deea409000000"),
            "$db": "yesocl"
          },
          "author": "user1",
          "email": "user1@test.com"
        }
      ],
      "slug": "lang-kinh-yestoc-tuan-27-3105-tam-thoi-di-ngang-va-dieu-chinh-trong-tuan-51a8b58d471dee2809000000",
      "category": {
        "$ref": "company_post_category",
        "$id": ObjectId("516c9640976982b00c000000"),
        "$db": "yesocl"
      },
      "description": "&lt;p&gt;\r\n\tHiện tại, 2 chỉ số đang tiếp cận các vùng kháng cự 505-510 và 62,5-63 , điều này được thể hiện rõ nét trong các phiên cuối tuần&lt;\/p&gt;\r\n",
      "thumb": "data\/catalog\/company\/519d1163471deee40b000000\/post\/51a8b58d471dee2809000001\/thumb.jpg"
    },
    {
      "_id": ObjectId("51a8b787471dee1009000001"),
      "title": "Lăng kính Yestoc 28\/05: “hạn chế mua đuổi”",
      "content": "&lt;p&gt;\r\n\tDiễn biến các chỉ số qua tiếp tục cho thấy sự tích cực trong xu hướng trung hạn, nhóm chứng khoán dậy sóng giúp thị trường có phiên tăng điểm mạnh mẽ. Tuy nhiên trong ngắn hạn, áp lực bán có thể gia tăng do VNIndex đang tiệm cận đỉnh đầu năm ở 518 trong khi &amp;nbsp;chỉ số HNX đóng cửa trên kháng cự 63,3 nhưng mức vượt qua khá nhỏ nên sự phá vỡ chưa rõ ràng&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm ngắn hạn (5-10 ngày)&lt;\/strong&gt;:&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tChúng tôi tiếp tục giữ quan điểm thị trường vẫn có thể có vài phiên điều chỉnh nhẹ về gần các mức hỗ trợ 500 trên Vnindex và 61 trên HNX trong tuần sau. Hai chỉ số vẫn hoạt động trong kênh tăng giá hẹp ngắn hạn với mức mục tiêu của nhịp tăng lần này là 520 của VN-Index và 65 của HNX. Do đó, các nhà đầu tư có thể tận dụng các nhịp điều chỉnh nhẹ về gần các mức hỗ trợ mới để tham gia giải ngân vào các mã vẫn đang ở trạng thái tích lũy hoặc chưa tăng mạnh, nhưng hạn chế giải ngân vào các cổ phiếu đã có mức tăng nóng như BTP, REE, PPC, HSG… trong thời gian qua vì chúng tôi quan ngại khả năng áp lực chốt lời có thể sẽ gia tăng mạnh lên nhóm cổ phiếu này trong các phiên tới.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/vnidex.png&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-2704&quot; height=&quot;0&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/vnidex-1024x583.png&quot; style=&quot;border: 1px solid black;&quot; title=&quot;vnidex&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Chiến lược trade ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;ul&gt;\r\n\t&lt;li&gt;\r\n\t\tRủi ro đang dần gia tăng khi mà cả hai chỉ số đều tiệm cận ngưỡng kháng cự nên nhà đầu tư tránh việc mua đuổi ở những phiên tăng mạnh.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tNhà đầu tư có thể duy việc giải ngân khi thị trường điều chỉnh và tránh việc lướt sóng ngắn hạn.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tDanh mục mã cổ phiếu đã được chúng tôi cập nhật trong &lt;a href=&quot;http:\/\/yestoc.com\/lang-kinh-yestoc-tuan-27-3105-tam-thoi-di-ngang-va-dieu-chinh-trong-tuan\/&quot;&gt;bản tin tuần 27-31\/5&lt;\/a&gt;&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n",
      "status": true,
      "created": ISODate("2013-05-28T14:45:27.0Z"),
      "updated": ISODate("2013-05-31T14:45:27.0Z"),
      "author": "user2",
      "email": "user2@test.com",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      },
      "slug": "lang-kinh-yestoc-2805-han-che-mua-duoi-51a8b787471dee1009000000",
      "category": {
        "$ref": "company_post_category",
        "$id": ObjectId("516c9640976982b00c000000"),
        "$db": "yesocl"
      },
      "description": "&lt;p&gt;\r\n\tDiễn biến các chỉ số qua tiếp tục cho thấy sự tích cực trong xu hướng trung hạn, nhóm chứng khoán dậy sóng giúp thị trường có phiên tăng điểm&lt;\/p&gt;\r\n",
      "thumb": "data\/catalog\/company\/519d1163471deee40b000000\/post\/51a8b787471dee1009000001\/thumb.jpg"
    }
  ],
  "slug": "yesocl",
  "status": true
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
  "_id": ObjectId("516aac38913db4a004000000"),
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
  "name": "Company Category",
  "path": "company\/category"
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
  "_id": ObjectId("516c974b976982740a000000"),
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
  "name": "Company Post",
  "path": "company\/post"
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
