
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

/** branch_post indexes **/
db.getCollection("branch_post").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** cache_post indexes **/
db.getCollection("cache_post").ensureIndex({
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

/** user_post indexes **/
db.getCollection("user_post").ensureIndex({
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
db.getCollection("admin").insert({
  "_id": ObjectId("52073699471dee9809000000"),
  "username": "tester",
  "password": "4509919b2026c296e2b649fdf352ff190f5e2a24",
  "group": {
    "$ref": "admin_group",
    "$id": ObjectId("52479d98471dee280c000001"),
    "$db": "yesocl"
  },
  "status": true,
  "salt": "af2a3c334"
});

/** admin_group records **/
db.getCollection("admin_group").insert({
  "_id": ObjectId("52479d98471dee280c000001"),
  "name": "Poster",
  "permissions": [
    {
      "_id": ObjectId("52479f72471dee280c000030"),
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
      "_id": ObjectId("52479f72471dee280c000031"),
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
      "_id": ObjectId("52479f72471dee280c000032"),
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
      "_id": ObjectId("52479f72471dee280c000033"),
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
      "_id": ObjectId("52479f72471dee280c000034"),
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
      "_id": ObjectId("52479f72471dee280c000035"),
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
    }
  ]
});
db.getCollection("admin_group").insert({
  "_id": ObjectId("515f0c69471dee8c1f000000"),
  "name": "Supper Admin",
  "permissions": [
    {
      "_id": ObjectId("52051a30471dee900a000002"),
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
      "_id": ObjectId("52051a30471dee900a000003"),
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
      "_id": ObjectId("52051a30471dee900a000004"),
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
      "_id": ObjectId("52051a30471dee900a000005"),
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
      "_id": ObjectId("52051a30471dee900a000006"),
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
      "_id": ObjectId("52051a30471dee900a000007"),
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
      "_id": ObjectId("52051a30471dee900a000008"),
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
      "_id": ObjectId("52051a30471dee900a000009"),
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
      "_id": ObjectId("52051a30471dee900a00000a"),
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
      "_id": ObjectId("52051a30471dee900a00000b"),
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
      "_id": ObjectId("52051a30471dee900a00000c"),
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
      "_id": ObjectId("52051a30471dee900a00000d"),
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
      "_id": ObjectId("52051a30471dee900a00000e"),
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
      "_id": ObjectId("52051a30471dee900a00000f"),
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
      "_id": ObjectId("52051a30471dee900a000010"),
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
      "_id": ObjectId("52051a30471dee900a000011"),
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
      "_id": ObjectId("52051a30471dee900a000012"),
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
      "_id": ObjectId("52051a30471dee900a000013"),
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
      "_id": ObjectId("52051a30471dee900a000014"),
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
      "_id": ObjectId("52051a30471dee900a000015"),
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
      "_id": ObjectId("52051a30471dee900a000016"),
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
      "_id": ObjectId("52051a30471dee900a000017"),
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
      "_id": ObjectId("52051a30471dee900a000018"),
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
      "_id": ObjectId("52051a30471dee900a000019"),
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
      "_id": ObjectId("52051a30471dee900a00001a"),
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
      "_id": ObjectId("52051a30471dee900a00001b"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("52051a16471dee900a000001"),
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
      "_id": ObjectId("52051a30471dee900a00001c"),
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
      "_id": ObjectId("52051a30471dee900a00001d"),
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
      "_id": ObjectId("52051a30471dee900a00001e"),
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
  "company": {
    "$ref": "company",
    "$id": ObjectId("51e97c88471dee180a000000"),
    "$db": "yesocl"
  },
  "deleted": false,
  "name": "Chứng khoán",
  "order": NumberInt(0),
  "slug": "yestoc-520ce99c471dee9c09000000",
  "status": true
});
db.getCollection("branch").insert({
  "_id": ObjectId("5247a0a3471dee280c000037"),
  "name": "IT",
  "slug": "it-5247a0a3471dee280c000036",
  "status": true,
  "company": {
    "$ref": "company",
    "$id": ObjectId("51e97c88471dee180a000000"),
    "$db": "yesocl"
  },
  "order": NumberInt(1)
});

/** branch_category records **/
db.getCollection("branch_category").insert({
  "_id": ObjectId("51d3a0cad87459c40a000019"),
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "name": "Phân tích chuyên sâu",
  "order": NumberInt(1),
  "slug": "phan-tich-chuyen-sau"
});
db.getCollection("branch_category").insert({
  "_id": ObjectId("51d3d07fd874591406000000"),
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "name": "Cổ Phiếu Đầu Cơ",
  "order": NumberInt(3),
  "slug": "co-phieu-dau-co"
});
db.getCollection("branch_category").insert({
  "_id": ObjectId("51d3ceced874596804000000"),
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "name": "Nhận định thị trường",
  "order": NumberInt(2),
  "slug": "nhan-dinh-thi-truong"
});
db.getCollection("branch_category").insert({
  "_id": ObjectId("5247a0e0471dee280c000038"),
  "name": "Công Nghệ",
  "slug": "cong-nghe",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("5247a0a3471dee280c000037"),
    "$db": "yesocl"
  },
  "order": NumberInt(1)
});
db.getCollection("branch_category").insert({
  "_id": ObjectId("5247a0f7471dee280c000039"),
  "name": "Website",
  "slug": "website",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("5247a0a3471dee280c000037"),
    "$db": "yesocl"
  },
  "order": NumberInt(2)
});

/** branch_post records **/
db.getCollection("branch_post").insert({
  "_id": ObjectId("5216d1f7471dee840a000003"),
  "author": "user1",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "category": {
    "$ref": "branch_category",
    "$id": ObjectId("51d3a0cad87459c40a000019"),
    "$db": "yesocl"
  },
  "comments": [
    {
      "_id": ObjectId("521c4ab2471dee200b000000"),
      "content": "1111111111",
      "status": true,
      "created": ISODate("2013-08-27T06:44:02.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521c4af5471dee200b000002"),
      "author": "user1",
      "content": "1111111111111",
      "created": ISODate("2013-08-27T06:45:09.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "status": true,
      "updated": ISODate("2013-09-01T17:37:54.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52234696471dee300d000000"),
      "author": "user1",
      "content": "222222222",
      "created": ISODate("2013-09-01T13:52:22.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "status": true,
      "updated": ISODate("2013-09-01T13:52:36.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "content": "&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; REE sẽ tổ chức ĐHCĐTN vào ngày 29\/3\/2013, trong đó có nội dung tăng vốn điều lệ lên 2.700 tỷ đồng từ chuyển đổi trái phiếu chuyển đổi thành 25,36 triệu cổ phiếu.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Công ty công bố KQKD năm 2012 vô cùng ấn tượng nhờ tăng trưởng ổn định từ các mảng kinh doanh và lợi nhuận đáng kể từ bán cổ phiếu STB.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Năm nay REE tiếp tục sự mở rộng chiến lược vào lĩnh vực dịch vụ tiện ích.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; HSC dự báo doanh thu năm 2013 của REE tăng trưởng 12% và lợi nhuận thuần tăng trưởng 2%, theo đó EPS dự phóng là 2.745đ.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Dự báo về EPS của HSC chưa tính đến rủi ro pha loãng, có thể sẽ là 10% nếu các trái phiếu trên được chuyển đổi toàn bộ.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Tại mức giá hiện nay là 18.900 đ\/cp, cổ phiếu REE hiện đang có P\/E dự phóng là 6,9 và P\/B dự phóng là 1,0 lần.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Chúng tôi tiếp tục duy trì đánh giá Khả quan đối với cổ phiếu REE dựa trên: ban lãnh đạo tốt và triển vọng tăng trưởng khá.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tQuý khách hàng có thể truy cập “Báo cáo ngắn” về CTCP Cơ điện lạnh_Mã chứng khoán: REE – HSX (cập nhật ngày 15\/3\/2013) bằng cách truy cập đường dẫn sau đây &lt;a href=&quot;https:\/\/www.hsc.com.vn\/hscportal\/downloadFile?fileid=174851&quot; target=&quot;_blank&quot;&gt;https:\/\/www.hsc.com.vn\/&lt;wbr \/&gt;hscportal\/downloadFile?fileid=&lt;wbr \/&gt;174851&lt;\/a&gt;&lt;\/p&gt;\r\n",
  "created": ISODate("2013-08-23T03:07:35.0Z"),
  "deleted": false,
  "description": "REE sẽ tổ chức ĐHCĐTN vào ngày 29\/3\/2013, trong đó có nội dung tăng vốn điều lệ lên 2.700 tỷ đồng từ chuyển đổi trái phiếu chuyển đổi thành [...]",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5555471deea409000000",
    "518f5f43471deeb40900001f"
  ],
  "slug": "bao-cao-ngan-ve-cong-ty-cong-ty-co-phan-co-dien-lanh-ree-5216d1f7471dee840a000002",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/5216d1f7471dee840a000003\/avatar.jpg",
  "title": "“Báo cáo ngắn” về Công ty Công ty Cổ phần Cơ điện lạnh (REE)",
  "updated": ISODate("2013-09-01T17:37:54.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("5216d154471dee800a000001"),
  "author": "user1",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "category": {
    "$ref": "branch_category",
    "$id": ObjectId("51d3a0cad87459c40a000019"),
    "$db": "yesocl"
  },
  "comments": [
    {
      "_id": ObjectId("521a4fba471deeb809000010"),
      "author": "user1",
      "content": "aaaaaaaaa",
      "created": ISODate("2013-08-25T18:40:58.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "status": true,
      "updated": ISODate("2013-09-01T13:52:43.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("521a4fc3471deeb809000012"),
      "content": "bbbbbbbbbbb",
      "status": true,
      "created": ISODate("2013-08-25T18:41:07.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    }
  ],
  "content": "&lt;p&gt;\r\n\tTheo tài liệu ĐHCĐTN của DIG (đánh giá Mua vào), thì công ty sẽ lấy ý kiến cổ đông về việc tăng vốn điều lệ lên 1,6 nghìn tỷ đồng (76,19 triệu USD) từ mức hiện tại là 1,43 nghìn tỷ đồng. DIG sẽ trình kế hoạch tăng vốn tại ĐHCĐTN diễn ra vào ngày 15\/4.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tVẫn chưa có thời gian cụ thể cho kế hoạch tăng vốn nhưng nhiều khả năng sẽ là trước cuối Q3 và có thể dưới hình thức phát hành quyền cho cổ đông hiện hữu. DIG đang cần thêm vốn để đầu tư cho các dự án của mình.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tHSC dự báo doanh thu năm 2013 đạt 968 tỷ đồng (tăng trưởng 23%) và lợi nhuận thuần đạt 62,6 tỷ đồng (tăng trưởng 169%). Dự báo này dựa trên giả định là DIG có thể ghi nhận doanh thu từ dự án Nam Vĩnh Yên và An Sơn. Chúng tôi tiếp tục duy trì đánh giá Mua vào đối với cổ phiếu DIG. Hiện DIG là một trong những cổ phiếu niêm yết tốt trong ngành BĐS chuyên về phát triển nhà ở giá thấp; tuy nhiên, sắp tới Tập đoàn Nam Long (đứng đầu về nhà ở giá thấp) sẽ chào sàn với giá tham chiếu 27.000đ theo đó các NĐT có thể sẽ chuyển bớt sự chú ý sang cổ phiếu sắp chào sàn này.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tNam Long là thương hiệu hàng đầu và có bề dày trong lĩnh vực BĐS giá thấp với 20 năm kinh nghiệm; có quỹ đất 567 ha mà phần lớn được mua cách đây hơn 13 năm và chủ yếu nằm trong và xung quanh TP HCM; có sản phẩm E-home rất thành công với căn hộ 9 tầng tập trung vào người mua sơ cấp với giá hấp dẫn là 1 tỷ đồng trở xuống; tại giá chào sàn, giá cổ phiếu của Tập đoàn Nam Long thấp hơn 38% so với NAV. Theo đó, các NĐT nên chờ và xem xét đầu tư vào cổ phiếu Tập đoàn Nam Long.&lt;\/p&gt;\r\n",
  "created": ISODate("2013-08-23T03:04:52.0Z"),
  "deleted": false,
  "description": "Theo tài liệu ĐHCĐTN của DIG (đánh giá Mua vào), thì công ty sẽ lấy ý kiến cổ đông về việc tăng vốn điều lệ lên 1,6 nghìn tỷ đồng",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5555471deea409000000"
  ],
  "slug": "bao-cao-ngan-ve-tong-cong-ty-co-phan-dau-tu-phat-trien-xay-dung-dig-5216d154471dee800a000000",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/5216d154471dee800a000001\/avatar.jpg",
  "title": "“Báo cáo ngắn” về Tổng Công ty Cổ phần Đầu tư Phát triển Xây dựng (DIG)",
  "updated": ISODate("2013-09-01T13:52:43.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("5216d23b471dee600b000001"),
  "author": "user1",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "category": {
    "$ref": "branch_category",
    "$id": ObjectId("51d3a0cad87459c40a000019"),
    "$db": "yesocl"
  },
  "comments": [
    {
      "_id": ObjectId("52179df7471dee3c08000002"),
      "content": "11111111111",
      "status": true,
      "created": ISODate("2013-08-23T17:37:59.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("52179edc471dee3c08000003"),
      "content": "11111111111",
      "status": true,
      "created": ISODate("2013-08-23T17:41:48.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("52179f28471dee3c08000004"),
      "content": "11111111111",
      "status": true,
      "created": ISODate("2013-08-23T17:43:04.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521878ae471dee900b000000"),
      "content": "3333333",
      "status": true,
      "created": ISODate("2013-08-24T09:11:10.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("52187e00471dee9c0b000000"),
      "content": "2222222",
      "status": true,
      "created": ISODate("2013-08-24T09:33:51.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("52187ece471dee9c0b000001"),
      "content": "4444444",
      "status": true,
      "created": ISODate("2013-08-24T09:37:18.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a4280471deed809000006"),
      "author": "user1",
      "content": "5555555555555",
      "created": ISODate("2013-08-25T17:44:32.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "status": true,
      "updated": ISODate("2013-09-01T06:28:18.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("521a4c7b471deed809000008"),
      "content": "66666666666",
      "status": true,
      "created": ISODate("2013-08-25T18:27:07.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a4c92471deed809000009"),
      "content": "777777777777",
      "status": true,
      "created": ISODate("2013-08-25T18:27:30.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a4cef471deed80900000a"),
      "content": "888888888888",
      "status": true,
      "created": ISODate("2013-08-25T18:29:03.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a4cf9471deed80900000b"),
      "content": "9999999999999999",
      "status": true,
      "created": ISODate("2013-08-25T18:29:13.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a4d38471deed80900000c"),
      "content": "100000000000",
      "status": true,
      "created": ISODate("2013-08-25T18:30:16.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521c4c1c471dee100b000001"),
      "content": "99999999999",
      "status": true,
      "created": ISODate("2013-08-27T06:50:04.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    }
  ],
  "content": "&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; PVFC đã trình bản đề xuất kiến nghị hỗ trợ từ phía PVN và NHNN trước, trong và sau quá trình hợp nhất với Western Bank.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; PVF đề xuất xin hỗ trợ dưới hình thức cấp vốn vay trung và dài hạn.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Thông qua bản đề xuất với kỳ vọng nhận được cam kết hỗ trợ tài chính chắc chắn trước khi quá trình hợp nhất diễn ra sẽ làm tăng cơ hội thành công cuối cùng.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Ít có khả năng toàn bộ nội dung kiến nghị và đề xuất sẽ được chấp nhận. Tuy nhiên, bản đề xuất sẽ khiến các cơ quan chức năng phải ngồi lại và suy ngẫm về những gì nên làm và theo đó có thể sẽ có thêm những hướng dẫn và thủ tục giúp hỗ trợ cho quá trình tái cơ cấu trong ngành ngân hàng.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Theo đó, cho dù kết quả cuối cùng có thế nào đi chăng nữa thì PVF và Western Bank sẽ đóng góp đáng kể vào quá trình tái cơ cấu trong ngành ngân hàng.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tQuý khách hàng có thể truy cập “Báo cáo ngắn” về Tổng Công ty Tài chính cổ phần Dầu khí Việt Nam_Mã chứng khoán: PVF – HSX (cập nhật ngày 13\/3\/2013) bằng cách truy cập đường dẫn sau đây &lt;a href=&quot;https:\/\/www.hsc.com.vn\/hscportal\/downloadFile?fileid=174688&quot; target=&quot;_blank&quot;&gt;https:\/\/www.hsc.com.vn\/&lt;wbr \/&gt;hscportal\/downloadFile?fileid=&lt;wbr \/&gt;174688&lt;\/a&gt;&lt;\/p&gt;\r\n",
  "created": ISODate("2013-08-23T03:08:43.0Z"),
  "deleted": false,
  "description": "PVFC đã trình bản đề xuất kiến nghị hỗ trợ từ phía PVN và NHNN trước, trong và sau quá trình hợp nhất với Western Bank.",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5555471deea409000000",
    "518f5f43471deeb40900001f"
  ],
  "slug": "bao-cao-ngan-ve-tong-cong-ty-tai-chinh-co-phan-dau-khi-viet-nam-pvf-5216d23b471dee600b000000",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/5216d23b471dee600b000001\/avatar.jpg",
  "title": "“Báo cáo ngắn” về Tổng Công ty Tài Chính Cổ phần Dầu khí Việt Nam (PVF)",
  "updated": ISODate("2013-09-01T06:28:18.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("5216d0e6471dee700b000001"),
  "author": "user1",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "category": {
    "$ref": "branch_category",
    "$id": ObjectId("51d3a0cad87459c40a000019"),
    "$db": "yesocl"
  },
  "comments": [
    {
      "_id": ObjectId("52179c2d471deeb408000006"),
      "content": "1111111111",
      "status": true,
      "created": ISODate("2013-08-23T17:30:21.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521e062e471deea009000000"),
      "content": "ouyh,.",
      "status": true,
      "created": ISODate("2013-08-28T14:16:14.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    }
  ],
  "content": "&lt;div align=&quot;justify&quot; style=&quot;text-align: justify;&quot;&gt;\r\n\tNgày 1\/6, Ngân hàng Thế giới (WB) tại Hà Nội cho biết: Ban Giám đốc WB đã thông qua hai khoản tín dụng từ Hiệp hội Phát triển Quốc tế (IDA) với tổng trị giá 250 triệu USD cho Dự án hỗ trợ y tế khu vực đồng bằng Sông Hồng và Dự án thúc đẩy sáng tạo thông qua nghiên cứu, khoa học và công nghệ.&lt;a href=&quot;http:\/\/yestoc.com\/wb-phe-duyet-250-trieu-usd-tin-dung-cho-viet-nam\/images-10\/&quot; rel=&quot;attachment wp-att-2741&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;aligncenter size-full wp-image-2741&quot; height=&quot;183&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/06\/images.jpg&quot; title=&quot;images&quot; width=&quot;275&quot; \/&gt;&lt;\/a&gt;\r\n\t&lt;p&gt;\r\n\t\tTrong tổng số tiền được phê duyệt, sẽ dành cho Dự án hỗ trợ y tế khu vực đồng bằng Sông Hồng 150 triệu USD, với mục đích cung cấp các dịch vụ y tế tốt hơn cho 15 triệu người, đặc biệt là trẻ em và phụ nữ, nâng cao hiệu quả và công bằng trong sử dụng dịch vụ bệnh viện tại 13 tỉnh vùng Đông Bắc và đồng bằng Bắc Bộ.&lt;\/p&gt;\r\n\t&lt;p&gt;\r\n\t\tDự án sẽ tăng cường năng lực cho các bệnh viên tỉnh và huyện để cung cấp dịch vụ tốt hơn để bệnh nhân không phải lên Hà Nội và giảm các rào cản tài chính bằng việc mở rộng đối đượng được nhận Thẻ Bảo hiểm y tế cho các hộ gia đình cận nghèo.&lt;\/p&gt;\r\n\t&lt;p&gt;\r\n\t\tDự án thúc đẩy sáng tạo thông qua nghiên cứu, khoa học và công nghệ sẽ được phê duyệt 100 triệu USD nhằm hỗ trợ hoạt động sáng tạo khoa học và công nghệ tại Việt Nam bằng cách thiết kế và thí điểm các chính sách khuyến khích sáng tạo khoa học và công nghệ, tăng cường hiệu quả của các Viện Nghiên cứu và Phát triển (R&amp;amp;D), khuyến khích sự phát triển của các doanh nghiệp công nghệ sáng tạo.&lt;\/p&gt;\r\n\t&lt;p&gt;\r\n\t\tNhững đối tượng chính thụ hưởng Dự án là các Viện Nghiên cứu và Phát triển và các doanh nghiệp công nghệ sáng tạo có đầu tư vào nghiên cứu và phát triển.&lt;\/p&gt;\r\n\t&lt;p&gt;\r\n\t\tCác doanh nghiệp tách ra hoặc mới thành lập được hỗ trở bởi các Viện Nghiên cứu và Phát triển và Trường đại học cũng sẽ là những đối tượng được hưởng lợi trực tiếp. Dự án cũng sẽ hỗ trợ thành lập các phòng nghiên cứu đối tác công-tư trong khu Khu công nghệ cao Hòa Lạc.\/.&lt;\/p&gt;\r\n&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\tNguyễn Hồng Điệp (TTXVN)&lt;\/div&gt;\r\n",
  "created": ISODate("2013-08-23T03:03:02.0Z"),
  "deleted": false,
  "description": "Ngày 1\/6, Ngân hàng Thế giới (WB) tại Hà Nội cho biết: Ban Giám đốc WB đã thông qua hai khoản tín dụng từ Hiệp hội Phát triển Quốc tế",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5555471deea409000000",
    "518f5f43471deeb40900001f"
  ],
  "slug": "wb-phe-duyet-250-trieu-usd-tin-dung-cho-viet-nam-5216d0e6471dee700b000000",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/5216d0e6471dee700b000001\/avatar.jpeg",
  "title": "WB phê duyệt 250 triệu USD tín dụng cho Việt Nam",
  "updated": ISODate("2013-08-30T18:29:59.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("5216d281471dee840a000005"),
  "author": "user1",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "category": {
    "$ref": "branch_category",
    "$id": ObjectId("51d3a0cad87459c40a000019"),
    "$db": "yesocl"
  },
  "comments": [
    {
      "_id": ObjectId("521e064a471deea009000001"),
      "content": "koi0ol",
      "status": true,
      "created": ISODate("2013-08-28T14:16:42.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521f2aec471dee200a000001"),
      "content": "111111111111",
      "status": true,
      "created": ISODate("2013-08-29T11:05:16.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    }
  ],
  "content": "&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Gần đây đã có bài báo viết về việc SJS (đánh giá Kém khả quan) phải đối mặt với nguy cơ hủy niêm yết trong năm sau nếu công ty tiếp tục lỗ trong năm 2013.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Hiện tại, chúng tôi cho rằng khả năng hủy niêm yết là khá thấp.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Chúng tôi cho rằng trong năm 2013, SJS sẽ lãi nhẹ nhờ ghi nhận lợi nhuận từ đất tại dự án Nam An Khánh đã bán trong năm 2011.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Và để có thể ghi nhận lợi nhuận, SJS chỉ cần hoàn thành phần nền móng của phần diện tích đã bán.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Tuy nhiên, công ty vẫn nợ nhiều với khoảng 1 nghìn tỷ đồng nợ gốc và lãi đến hạn thanh toán trong năm 2013.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Chúng tôi cho rằng SJS sẽ xin giãn nợ để không phải gán nợ khoảng 10ha đất.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Dựa trên dự báo của chúng tôi, giá cổ phiếu SJS thấp hơn 30% so với NAV; P\/E dự phóng là 42,4 lần và P\/B 1,3 lần.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Chúng tôi tiếp tục duy trì đánh giá Kém khả quan.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tQuý khách hàng có thể truy cập “Báo cáo ngắn” về CTCP Đầu tư Phát triển Đô thị và KCN Sông Đà_Mã chứng khoán: SJS – HSX (cập nhật ngày 11\/3\/2013) bằng cách truy cập đường dẫn sau đây &lt;a href=&quot;https:\/\/www.hsc.com.vn\/hscportal\/downloadFile?fileid=173987&quot; target=&quot;_blank&quot;&gt;https:\/\/www.hsc.com.vn\/&lt;wbr \/&gt;hscportal\/downloadFile?fileid=&lt;wbr \/&gt;173987&lt;\/a&gt;&lt;\/p&gt;\r\n",
  "created": ISODate("2013-08-23T03:09:53.0Z"),
  "deleted": false,
  "description": "Gần đây đã có bài báo viết về việc SJS (đánh giá Kém khả quan) phải đối mặt với nguy cơ hủy niêm yết trong năm sau nếu công [...]",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5555471deea409000000"
  ],
  "slug": "bao-cao-ngan-ve-cong-ty-cong-ty-co-phan-dau-tu-phat-trien-do-thi-va-khu-cong-nghiep-song-da-sjs-5216d281471dee840a000004",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/5216d281471dee840a000005\/avatar.jpg",
  "title": "“Báo cáo ngắn” về Công ty Công ty Cổ phần Đầu tư Phát triển Đô thị và Khu Công nghiệp Sông Đà (SJS)",
  "updated": ISODate("2013-08-29T11:05:16.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("5217929f471dee3c08000001"),
  "author": "user1",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "category": {
    "$ref": "branch_category",
    "$id": ObjectId("51d3ceced874596804000000"),
    "$db": "yesocl"
  },
  "comments": [
    {
      "_id": ObjectId("521c4b6b471dee200b000003"),
      "author": "user1",
      "content": "111111111111",
      "created": ISODate("2013-08-27T06:47:07.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "status": true,
      "updated": ISODate("2013-09-03T05:27:14.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("521e101c471dee5c09000005"),
      "content": "222222222",
      "status": true,
      "created": ISODate("2013-08-28T14:58:36.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521e2b61471dee1409000003"),
      "content": "333333333333",
      "status": true,
      "created": ISODate("2013-08-28T16:54:57.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    }
  ],
  "content": "&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tThị trường tiếp tục phiên tăng điểm thứ 2 liên tiếp, cả hai chỉ số đều hình thành các cây nến trắng lớn, đặc biệt là thanh khoản trên sàn Hose đã tăng đột biến. Thị trường cho thấy sự phân hóa tập trung ở các cổ phiếu penny mang tính đầu cơ khiến những mã này có khối lượng dư trần khá lớn, điển hình là ITA, KBC, DIG, PVT, OGC, DQC…, trong khi các mã bluechip có phần yếu hơn và chỉ xanh nhẹ. Nhìn chung, thị trường có diễn biến khá tốt trong phiên hôm nay, tuy nhiên chúng tôi vẫn giữ quan điểm trong bài phân tích trước, &amp;nbsp;khả năng Vnindex sẽ gặp khó khăn khi tiệm cận vùng cản mạnh 507-510, cũng như vùng 63-63.5 trên Hnxindex.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/08\/vnindex.png&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-3306&quot; height=&quot;452&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/08\/vnindex-1024x452.png&quot; style=&quot;border: 1px solid black;&quot; title=&quot;vnindex&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Chiến lược giao dịch ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;ul&gt;\r\n\t&lt;li&gt;\r\n\t\tNhà đầu tư có thể chốt lời một phần danh mục như chúng tôi khuyến nghị trong các phiên tăng&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tHạn chế mua đuổi cổ phiếu khi Vnindex tiệm cận ngưỡng kháng cự mạnh&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tChúng tôi sẽ cập nhật điểm mua mới khi Vnindex bức phá được ngưỡng kháng cự 507-510&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n",
  "created": ISODate("2013-08-23T16:49:35.0Z"),
  "deleted": false,
  "description": "Quan điểm kĩ thuật ngắn hạn: Thị trường tiếp tục phiên tăng điểm thứ 2 liên tiếp, cả hai chỉ số đều hình thành các cây nến trắng lớn, đặc [...]",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    
  ],
  "slug": "lang-kinh-yestoc-phien-1608-can-trong-vung-khang-cu-manh-5217929f471dee3c08000000",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/5217929f471dee3c08000001\/avatar.png",
  "title": "Lăng kính Yestoc phiên 16\/08: “cẩn trọng vùng kháng cự mạnh”",
  "updated": ISODate("2013-09-03T05:27:14.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("52179237471deeb408000001"),
  "author": "user1",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "category": {
    "$ref": "branch_category",
    "$id": ObjectId("51d3ceced874596804000000"),
    "$db": "yesocl"
  },
  "content": "&lt;p&gt;\r\n\t&lt;strong&gt;Review quan điểm tuần trước:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tChúng tôi cho rằng xu thế tăng điểm trong ngắn hạn sẽ được duy trì khi Vnindex bức phá vùng 495-497 và test lại thành công ngưỡng 500 điểm. Theo quan sát của chúng tôi thì mức kháng cự mạnh của Vnindex là vùng đỉnh cũ 507-510 và trên Hnxindex là vùng 62.5.&amp;nbsp;Nhà đầu tư ngắn hạn đã giải ngân khi Vnindex test lại vùng 497 như khuyến nghị trong bản tin trước có thể tiếp tục nắm giữ và hạn chế giải ngân khi Vnindex tăng lên vùng 507-510.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tĐóng cửa phiên giao dịch cuối tuần, khối lượng tăng mạnh và các các chỉ báo đảo chiều đang hỗ trợ tích cực cho VNIndex. Tuy nhiên, vùng 507-510 là ngưỡng cản khá mạnh của Vnindex (đây là điểm nối các đỉnh của mẫu hình vai đầu vai trung dài hạn) do đó hoạt động chốt lời mạnh có thể sẽ tiếp tục diễn ra vào đầu tuần sau. Chúng tôi cho rằng nếu thanh khoản tiếp tục duy trì trên 50tr\/ phiên thì có thể Vnindex sẽ chỉ điều chỉnh nhẹ ( nếu có) về vùng 502-503. Ngược lại, nếu phá vỡ ngưỡng cản 507-510, Vnindex sẽ hướng về vùng kháng cự kế tiếp là 525-530.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tPhân tích đồ thị Hnxindex có thể thấy mẫu hình cái nêm hướng xuống đang được hình thành, nếu vùng cản 63-63.5 được phá vỡ, khả năng Hnxindex sẽ hình thành 1 xu hướng tăng mạnh với taget ở vùng 66-67.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/08\/vnindex1.png&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-3346&quot; height=&quot;452&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/08\/vnindex1-1024x452.png&quot; style=&quot;border: 1px solid black;&quot; title=&quot;vnindex&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật trung hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tỞ chart tuần Vnindex, chỉ số này vẫn chưa xuất hiện điểm mua trung hạn do vùng kháng cự 510-525 tập trung khá nhiều lực bán mạnh, chúng tôi đánh giá xu hướng trung hạn hiện tại ở mức trung tính và cần thời gian để xác nhận.&amp;nbsp;Do đó, nhà đầu tư trung hạn nên dừng trạng thái mua trong giai đoạn này và chờ đợi xu hướng rõ ràng hơn.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Chiến lược giao dịch ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;ul&gt;\r\n\t&lt;li&gt;\r\n\t\tNhà đầu tư lướt sóng sau khi chốt lời ở vùng 508 như khuyến nghị của chúng tôi&amp;nbsp;có thể tiếp tục giải ngân khi Vnindex tích lũy trong các phiên đầu tuần.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tĐối với nhà đầu tư chấp nhận rủi ro thấp, có thể chờ mua khi Vnindex phá vỡ vùng 507-510 .&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tDanh mục tập trung vào các mã midcap cơ bản tốt và có dòng tiền mạnh.&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n",
  "created": ISODate("2013-08-23T16:47:51.0Z"),
  "deleted": false,
  "description": "Review quan điểm tuần trước: Chúng tôi cho rằng xu thế tăng điểm trong ngắn hạn sẽ được duy trì khi Vnindex bức phá vùng 495-497 và test lại thành [...]",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5555471deea409000000"
  ],
  "slug": "lang-kinh-yestoc-tuan-1908-2308-tang-ti-trong-co-phieu-khi-vnindex-pha-vo-vung-can-507-510-52179237471deeb408000000",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/52179237471deeb408000001\/avatar.jpg",
  "title": "Lăng kính Yestoc tuần 19\/08-23\/08: ” tăng tỉ trọng cổ phiếu khi Vnindex phá vỡ vùng cản 507-510″",
  "updated": ISODate("2013-08-29T17:35:44.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("5216d059471dee740b000001"),
  "author": "user1",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "category": {
    "$ref": "branch_category",
    "$id": ObjectId("51d3a0cad87459c40a000019"),
    "$db": "yesocl"
  },
  "comments": [
    {
      "_id": ObjectId("521f8b51471dee5c11000004"),
      "content": "1111111111111111",
      "status": true,
      "created": ISODate("2013-08-29T17:56:33.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521f8b56471dee5c11000006"),
      "content": "222222222222",
      "status": true,
      "created": ISODate("2013-08-29T17:56:38.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521f8b6c471dee5c11000007"),
      "content": "33333333333333333",
      "status": true,
      "created": ISODate("2013-08-29T17:57:00.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    }
  ],
  "content": "&lt;p&gt;\r\n\t&lt;em&gt;Chúng tôi dự báo thị trường sữa của Việt Nam sẽ tăng trưởng với tốc độ CAGR 17,3% trong 3 năm tới.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Chúng tôi cũng tin tưởng VNM có thể duy trì được tốc độ tăng trưởng doanh thu trên 20%\/năm nhờ giành thêm được thị phần.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Chúng tôi kỳ vọng tăng trưởng trong tương lai của VNM sẽ dựa trên 4 nhóm sản phẩm chính.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Xuất khẩu cũng sẽ là động lực tăng trưởng vững của VNM nhưng chúng tôi cho rằng sẽ không có sự đột biến thần kỳ trong hoạt động này.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Chúng tôi cũng kỳ vọng VNM sẽ có hoạt động M&amp;amp;A quy mô nhỏ tại Việt Nam và nước ngoài.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Tỷ suất lợi nhuận gộp nhiều khả năng đã đạt cao nhất là 36,5% vào 2009 và năm nay sẽ giảm do chi phí đầu vào tăng.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Tỷ suất lợi nhuận sẽ ổn định những năm sau đó và chủ yếu chịu ảnh hưởng của biến động của chi phí đầu vào.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Tiền mặt sẽ tăng lên kể từ năm nay vì các hoạt động đầu tư của công ty hiện đã gần như hoàn tất.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Và chúng tôi kỳ vọng tỷ lệ chi trả cổ tức trên lợi nhuận sẽ tăng dần lên 50%.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Hiện room dành cho NĐTNN của cổ phiếu VNM đã hết nhưng có thể sẽ được nới vào năm 2014.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Định giá cổ phiếu VNM vẫn hợp lý và nếu so với bình quân các doanh nghiệp cùng ngành thì giá cổ phiếu VNM vẫn còn tiềm năng tăng.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Hiện P\/E dự phóng 2013 của cổ phiếu VNM là 17,4 lần và P\/B là 6,1 lần. Chúng tôi tiếp tục duy trì đánh giá Khả quan đối với cổ phiếu VNM.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;nguồn HSC&lt;\/em&gt;&lt;\/p&gt;\r\n",
  "created": ISODate("2013-08-23T03:00:41.0Z"),
  "deleted": false,
  "description": "Chúng tôi dự báo thị trường sữa của Việt Nam sẽ tăng trưởng với tốc độ CAGR 17,3% trong 3 năm tới.",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5555471deea409000000"
  ],
  "slug": "ctcp-sua-viet-nam-vnm-hsx-uoc-kqkd-6-thang-va-trien-vong-kqkd-2013-va-2014-tiep-tuc-duy-tri-danh-gia-kha-quan-521887e7471dee9c0b000002",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/5216d059471dee740b000001\/avatar.jpg",
  "title": "CTCP sữa Việt Nam (VNM – HSX): Ước KQKD 6 tháng và triển vọng KQKD 2013 và 2014. Tiếp tục duy trì đánh giá Khả quan",
  "updated": ISODate("2013-08-29T17:57:00.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("52179345471deefc0b000001"),
  "author": "user1",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "category": {
    "$ref": "branch_category",
    "$id": ObjectId("51d3ceced874596804000000"),
    "$db": "yesocl"
  },
  "comments": [
    {
      "_id": ObjectId("521e2abb471dee1409000000"),
      "author": "user1",
      "content": "11111111111111",
      "created": ISODate("2013-08-28T16:52:11.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "status": true,
      "updated": ISODate("2013-08-29T14:05:34.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("521e2b31471dee1409000002"),
      "author": "user1",
      "content": "22222222222",
      "created": ISODate("2013-08-28T16:54:09.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "status": true,
      "updated": ISODate("2013-09-02T10:20:06.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("521e2b7a471dee1409000004"),
      "author": "user1",
      "content": "33333333333333",
      "created": ISODate("2013-08-28T16:55:22.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "status": true,
      "updated": ISODate("2013-08-29T16:27:52.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("521f2acc471dee200a000000"),
      "content": "44444444444",
      "status": true,
      "created": ISODate("2013-08-29T11:04:44.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521f7682471dee5c11000000"),
      "content": "55555555555",
      "status": true,
      "created": ISODate("2013-08-29T16:27:46.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("5222d7e4471dee180a000000"),
      "content": "66666666666",
      "status": true,
      "created": ISODate("2013-09-01T06:00:03.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    }
  ],
  "content": "&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tVnindex hôm nay tiếp tục một phiên tăng điểm mạnh lên vùng kháng cự 492, diễn biến của nhóm cổ phiếu trụ cột vẫn đang là tác nhân chủ yếu tác động đà tăng trong phiên. Thanh khoản trên Vnindex sụt giảm mạnh và độ rộng thị trường giảm không ủng hộ cho đà tăng điểm hiện tại. Chúng tôi tiếp tục giữ quan điểm thận trọng ở xu hướng ngắn hạn và khả năng thị trường có thể sẽ xuất hiện các nhịp giảm điểm mạnh trong những phiên tới khi tiếp cận ngưỡng kháng cự 492-4-5 của Vnindex và 61.7-62 của Hnxindex.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Chiến lược giao dịch ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;ul&gt;\r\n\t&lt;li&gt;\r\n\t\tNhà đầu tư lướt sóng nên cân nhắc mở vị thế bán ở thời điểm hiện tại và hạ tỉ trọng cổ phiếu xuống ngưỡng an toàn.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tHạn chế bắt đáy khi thị trường chưa giảm về vùng hỗ trợ mạnh 466-470 trên Vnindex và 59 trên Hnxindex.&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n",
  "created": ISODate("2013-08-23T16:52:21.0Z"),
  "deleted": false,
  "description": "Quan điểm kĩ thuật ngắn hạn: Vnindex hôm nay tiếp tục một phiên tăng điểm mạnh lên vùng kháng cự 492, diễn biến của nhóm cổ phiếu trụ cột vẫn [...]",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5f43471deeb40900001f",
    "518f5555471deea409000000"
  ],
  "slug": "lang-kinh-yestoc-phien-0108-cho-mua-tai-muc-ho-tro-manh-52179345471deefc0b000000",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/52179345471deefc0b000001\/avatar.jpg",
  "title": "Lăng kính Yestoc phiên 01\/08: “Chờ mua tại mức hỗ trợ mạnh”",
  "updated": ISODate("2013-09-29T17:06:48.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("521792d9471deeb408000003"),
  "author": "user1",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "category": {
    "$ref": "branch_category",
    "$id": ObjectId("51d3ceced874596804000000"),
    "$db": "yesocl"
  },
  "comments": [
    {
      "_id": ObjectId("521e0893471dee8c09000000"),
      "author": "user1",
      "content": "1111111111111111",
      "created": ISODate("2013-08-28T14:26:27.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "status": true,
      "updated": ISODate("2013-09-02T10:20:38.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("521e0d36471dee5c09000000"),
      "content": "2222222222222",
      "status": true,
      "created": ISODate("2013-08-28T14:46:14.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521e0db9471dee5c09000001"),
      "author": "user1",
      "content": "3333333333",
      "created": ISODate("2013-08-28T14:48:25.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "status": true,
      "updated": ISODate("2013-09-01T06:27:09.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("521e0f9f471dee5c09000002"),
      "author": "user1",
      "content": "444444444444",
      "created": ISODate("2013-08-28T14:56:31.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "status": true,
      "updated": ISODate("2013-09-01T06:26:57.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("521e0fd1471dee5c09000003"),
      "content": "55555555555555",
      "status": true,
      "created": ISODate("2013-08-28T14:57:21.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521e1012471dee5c09000004"),
      "author": "user1",
      "content": "6666666666666",
      "created": ISODate("2013-08-28T14:58:26.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "status": true,
      "updated": ISODate("2013-09-01T06:26:49.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5222d7f7471dee0c0a000000"),
      "content": "777777777777",
      "status": true,
      "created": ISODate("2013-09-01T06:00:23.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    }
  ],
  "content": "&lt;p&gt;\r\n\t&lt;strong&gt;Review quan điểm tuần trước :&lt;\/strong&gt; …trạng thái mua bán chỉ xuất hiện khi có sự bứt phá hoặc giảm điểm rõ rệt, nếu không thì&amp;nbsp;thị trường vẫn chỉ giao dịch trong trạng thái tích lũy biên độ hẹp và khối lượng giao dịch&amp;nbsp; thấp.&amp;nbsp;Vị thế mua chỉ bắt đầu khi VNIndex phá vỡ ngưỡng cản 495 – 497 , và khối lượng giao dịch cải thiện trên 40 triệu\/phiên, ngược lại, nếu phá ngưỡng 488-490, Vnindex sẽ tiếp tục giảm về vùng 470.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tChúng tôi cho rằng xu thế tăng điểm trong ngắn hạn sẽ được duy trì khi Vnindex bức phá vùng 495-497 và test lại thành công ngưỡng 500 điểm. Tuy nhiên, thanh khoản vẫn chưa được cải thiện đang kể cũng như hai chỉ số Vnindex và Hnxindex dịch chuyển nghịch chiều, &amp;nbsp;cho thấy thị trường đủ động lục để tăng mạnh. Theo quan sát của chúng tôi thì mức kháng cự mạnh của Vnindex là vùng đỉnh cũ 507-510 và trên Hnxindex là vùng 62.5.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật trung hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tĐồ thị tuần, Vnindex vẫn đang trong trạng thái trung tín, và đang có xu hướng giảm về vùng hỗ trợ trung hạn 466-470. Chúng tôi tiếp tục giữ quan điểm thận trong như trong các khuyến nghĩ trước, nếu ngưỡng hỗ trợ này bị phá vỡ thì xác suất hình thành mẫu hình vai đầu vai ở đỉnh sẽ khá cao. Do đó, nhà đầu tư trung hạn nên dừng trạng thái mua trong giai đoạn này và chờ đợi xu hướng rõ ràng hơn.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Chiến lược giao dịch ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;ul&gt;\r\n\t&lt;li&gt;\r\n\t\tNhà đầu tư ngắn hạn đã giải ngân khi Vnindex test lại vùng 508 như khuyến nghị trong bản tin trước có thể tiếp tục nắm giữ và hạn chế giải ngân khi Vnindex tăng lên vùng 507-510.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tThanh khoản hiện tại khá thấp do đó Danh mục chỉ nên tập trung vào các mã bluechip thu hút dòng tiền trên Vnindex.&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n",
  "created": ISODate("2013-08-23T16:50:33.0Z"),
  "deleted": false,
  "description": "Review quan điểm tuần trước : …trạng thái mua bán chỉ xuất hiện khi có sự bứt phá hoặc giảm điểm rõ rệt, nếu không thì thị trường vẫn chỉ giao [...]",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5f43471deeb40900001f"
  ],
  "slug": "lang-kinh-yestoc-tuan-12-1608-da-tang-ngan-han-co-the-tiep-tuc-521792d9471deeb408000002",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/521792d9471deeb408000003\/avatar.jpg",
  "title": "Lăng kính Yestoc tuần 12-16\/08: ” Đà tăng ngắn hạn có thể tiếp tục”",
  "updated": ISODate("2013-09-02T10:56:50.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("5216d192471dee840a000001"),
  "author": "user1",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "category": {
    "$ref": "branch_category",
    "$id": ObjectId("51d3a0cad87459c40a000019"),
    "$db": "yesocl"
  },
  "comments": [
    {
      "_id": ObjectId("521c4b78471dee200b000005"),
      "content": "2222222222",
      "status": true,
      "created": ISODate("2013-08-27T06:47:20.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521c4e58471dee100b000002"),
      "content": "33333333333",
      "status": true,
      "created": ISODate("2013-08-27T06:59:35.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521f8a34471dee5c11000003"),
      "content": "4444444444444",
      "status": true,
      "created": ISODate("2013-08-29T17:51:48.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    }
  ],
  "content": "&lt;p&gt;\r\n\tVSC đã tổ chức ĐHCĐTN vào cuối tuần. VSC đặt kế hoạch kinh doanh cho năm nay với doanh thu thuần là 650 tỷ đồng, giảm 17% và lợi nhuận trước thuế là 214 tỷ đồng, giảm 26%. Công ty sẽ trả cổ tức bằng cả cổ phiếu (tỷ lệ 1:5) và tiền mặt (4.000đ\/cp). Chúng tôi cho rằng tiền mặt sẽ được trả sau khi trả bằng cổ phiếu nên tỷ lệ cổ tức\/giá tổng cộng sẽ là 10,3% ở mức giá hiện tại.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tKế hoạch kinh doanh năm 2013 của VSC có vẻ khá thận trọng và đây là điều thường thấy ở công ty này. Chúng tôi thấy rằng trong 5 năm liền (từ 2008-2012), công ty đã vượt kế hoạch lợi nhuận trước thuế đề ra là 46%. Tốc độ tăng trưởng CAGR trong 5 năm của doanh thu là 25% còn của lợi nhuận thuần là 21%. Trong năm nay, VSC đã lý giải việc đặt kế hoạch kinh doanh thấp là do doanh thu từ dịch vụ lưu kho lạnh sẽ giảm do trong năm ngoái doanh thu này đạt cao trong điều kiện đặc biệt. Trong năm 2012, công ty đạt 80 tỷ đồng doanh thu từ dịch vụ lưu kho lạnh, tăng mạnh 43% do chính phủ Trung Quốc đã bất ngờ đóng cửa biên giới trong 3 tháng trong năm 2012 khiến các công ty phải lưu hàng trong kho lạnh trong nhiều tháng. Chúng tôi cũng đã có đề cập đến điều này trong báo cáo trước về VSC.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tVSC hiện đang chạy hết công suất nên sẽ không còn nhiều dư địa để tăng trưởng. Trong năm nay, VSC đặt kế hoạch hàng hóa qua cảng là 350.000 TEU, chỉ tăng 1%. Và chúng tôi cũng dự báo phí dịch vụ sẽ giữ nguyên. VSC đã giữ nguyên phí dịch vụ trong 2 năm và chúng tôi cũng lưu ý là hầu hết phí dịch vụ được tính bằng USD.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tChúng tôi dự báo doanh thu từ hoạt động kinh doanh cảng sẽ đạt 706 tỷ đồng, tăng trưởng 1%; cao hơn kế hoạch của công ty 9%; và dự báo doanh thu từ dịch vụ lưu kho lạnh giảm 30% và đạt 56 tỷ đồng trong năm 2013. Dự báo này dựa trên giả định là hàng thực phẩm đông lạnh sẽ được lưu thông thông suốt qua biên giới Việt – Trung trong năm nay. Tóm lại, chúng tôi dự báo tổng doanh thu là 762 tỷ đồng, giảm nhẹ 2%.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tChúng tôi cũng dự báo lợi nhuận thuần sẽ đạt 228 tỷ đồng, không thay đổi so với năm 2012 và cao hơn 33% so với kế hoạch của công ty. Dự báo lợi nhuận thuần của chúng tôi dựa trên giả định chi phí giảm nhờ công ty giảm sự phụ thuộc vào bên cho thuê bãi container. Năm nay, công ty sẽ xây dựng bãi container của riêng mình với diện tích 7,5ha. Bãi container này sẽ được hoàn thành và đưa vào hoạt động vào Q2 năm nay và sẽ giúp giảm 7% giá vốn hàng bán xuống còn 474 tỷ đồng trong năm 2013. Điều này sẽ giúp tỷ suất lợi nhuận gộp tăng từ mức 34,4% lên 37,8%.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tVSC có kế hoạch tăng vốn điều lệ trong năm nay thông qua phát hành cổ phiếu thưởng nói trên, theo đó sẽ tăng vốn điều lệ từ 240 tỷ đồng lên 288 tỷ đồng từ giữa năm nay. EPS điều chỉnh pha loãng 2013 sẽ là 8.620đ, giảm 10%. Theo mức giá hôm nay, VSC hiện đang giao dịch với P\/E dự phóng là 4,9 lần và P\/B dự phóng là 1,5 lần. VSC có tình hình tài chính tốt với tỷ lệ nợ\/tổng tài sản chỉ ở mức 0,25 lần và tỷ lệ cổ tức\/giá tương đối cao. Tuy nhiên, trước mắt thì công ty dường như không có kế hoạch tăng công suất và do đó khó giữ được tiềm năng tăng trưởng dài hạn. Theo kế hoạch đầu tư mở rộng năm 2013, chúng tôi thấy rằng công ty có vẻ chú trọng vào việc mở rộng bãi container để giảm sự phụ thuộc vào bên thứ ba. Vì vậy, cổ phiếu có nguy cơ mất đi khả năng tăng trưởng nếu công ty không có kế hoạch tăng công suất hoạt động kinh doanh cảng. Cổ phiếu VSC hiện có tỷ lệ cổ tức\/giá khá tốt và định giá thấp theo quan điểm của chúng tôi.&lt;\/p&gt;\r\n",
  "created": ISODate("2013-08-23T03:05:54.0Z"),
  "deleted": false,
  "description": "VSC đã tổ chức ĐHCĐTN vào cuối tuần. VSC đặt kế hoạch kinh doanh cho năm nay với doanh thu thuần là 650 tỷ đồng, giảm 17% và lợi nhuận [...]",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5555471deea409000000"
  ],
  "slug": "bao-cao-ngan-ve-cong-ty-co-phan-tap-doan-container-viet-nam-vsc-5216d192471dee840a000000",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/5216d192471dee840a000001\/avatar.jpg",
  "title": "“Báo cáo ngắn” về Công ty cổ phần Tập đoàn Container Việt Nam (VSC)",
  "updated": ISODate("2013-08-29T17:51:48.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("52179310471deec003000001"),
  "author": "user1",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "category": {
    "$ref": "branch_category",
    "$id": ObjectId("51d3ceced874596804000000"),
    "$db": "yesocl"
  },
  "comments": [
    {
      "_id": ObjectId("52486249471dee740b000000"),
      "author": "user1",
      "content": "1. abc",
      "created": ISODate("2013-09-29T17:24:25.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-09-29T17:24:25.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("524862b7471dee740b000002"),
      "author": "user1",
      "content": "2. abc",
      "created": ISODate("2013-09-29T17:26:15.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-09-29T17:26:15.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("524862c3471dee740b000003"),
      "author": "user1",
      "content": "3. abc",
      "created": ISODate("2013-09-29T17:26:27.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-09-29T17:26:27.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "content": "&lt;p&gt;\r\n\t&lt;strong&gt;Review quan điềm tuần trước&lt;\/strong&gt;:&amp;nbsp;&amp;nbsp;Chúng tôi cho rằng nhịp tăng nhẹ có thể sẽ tiếp&amp;nbsp;tục trong phiên đầu tuần với khối lượng duy trì ở mức trung bình. Vùng kháng cự của nhịp hồi ngắn này là 495 – 497 trên chỉ số VNIndex và 61.5 trên chỉ số HNXIndex. Do đó, nhà đầu tư có thể tận dụng nhịp hồi sắp tới của thị trường để hạ tỉ trọng cổ phiếu xuống mức thấp và chờ tín hiệu xác nhận điểm giải ngân của chúng tôi.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tChúng tôi vẫn bảo lưu quan điểm trong nhận định trước đó và cho rằng sự tăng điểm trong tuần vừa qua chỉ là phản ứng mang tính kĩ thuật của thị trường trong ngắn hạn. Khả năng các phiên đầu tuần thị trường sẽ gặp&amp;nbsp;áp lực bán mạnh do tâm lý nhà đầu tư vẫn ở mức thận trọng cũng như dòng tiền lớn đứng ngoài. Tuy nhiên,&amp;nbsp;trạng thái mua bán chỉ xuất hiện khi có sự bứt phá hoặc giảm điểm rõ rệt, nếu không thì&amp;nbsp;thị trường vẫn chỉ giao dịch trong trạng thái tích lũy biên độ hẹp và khối lượng giao dịch&amp;nbsp; thấp.&amp;nbsp;Vị thế mua chỉ bắt đầu khi VNIndex phá vỡ ngưỡng cản 495 – 497 , và khối lượng giao dịch cải thiện trên 40 triệu\/phiên, ngược lại, nếu phá ngưỡng 488-490, Vnindex sẽ tiếp tục giảm về vùng 470.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật trung hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tĐồ thị tuần, Vnindex vẫn đang trong trạng thái trung tín, và đang có xu hướng giảm về vùng hỗ trợ trung hạn 466-470. Chúng tôi tiếp tục giữ quan điểm thận trong như trong các khuyến nghĩ trước, nếu ngưỡng hỗ trợ này bị phá vỡ thì xác suất hình thành mẫu hình vai đầu vai ở đỉnh sẽ khá cao. Do đó, nhà đầu tư trung hạn nên dừng trạng thái mua trong giai đoạn này và chờ đợi xu hướng rõ ràng hơn.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Chiến lược giao dịch ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;ul&gt;\r\n\t&lt;li&gt;\r\n\t\tNhà đầu tư nên tạm dừng việc giải ngân và chờ đợi thị trường cân bằng hơn cùng sự cải thiện của thanh khoản.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tNếu thị trường tiếp tục phá vỡ ngưỡng hỗ trợ 488-490,việc xem xét giảm tỷ lệ cổ phiếu là cần thiết.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tĐối với nhà đầu tư chấp nhận rủi ro cao, có thể giải ngân khi thị trường xuất hiện nhịp điều chỉnh đầu tuần.&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n",
  "created": ISODate("2013-08-23T16:51:28.0Z"),
  "deleted": false,
  "description": "Review quan điềm tuần trước:  Chúng tôi cho rằng nhịp tăng nhẹ có thể sẽ tiếp tục trong phiên đầu tuần với khối lượng duy trì ở mức trung bình. Vùng kháng [...]",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5f43471deeb40900001f"
  ],
  "slug": "lang-kinh-yestoc-tuan-05-0908-cho-doi-xu-huong-ro-rang-52179310471deec003000000",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/52179310471deec003000001\/avatar.jpg",
  "title": "Lăng kính Yestoc tuần 05-09\/08: “chờ đợi xu hướng rõ ràng”",
  "updated": ISODate("2013-10-13T06:39:25.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("52179382471deeb408000005"),
  "author": "user1",
  "branch": {
    "$ref": "branch",
    "$id": ObjectId("51d39ba5d87459c40a000017"),
    "$db": "yesocl"
  },
  "category": {
    "$ref": "branch_category",
    "$id": ObjectId("51d3ceced874596804000000"),
    "$db": "yesocl"
  },
  "comments": [
    {
      "_id": ObjectId("521a0241471deed409000000"),
      "content": "aaaaaaaaaaaaaaaa",
      "status": true,
      "created": ISODate("2013-08-25T13:10:25.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a026f471deed409000001"),
      "content": "11111111111111",
      "status": true,
      "created": ISODate("2013-08-25T13:11:11.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a0291471deed409000002"),
      "content": "222222222222222",
      "status": true,
      "created": ISODate("2013-08-25T13:11:45.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a02c7471deed409000003"),
      "content": "222222222222222",
      "status": true,
      "created": ISODate("2013-08-25T13:12:39.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a02e4471dee000900000c"),
      "content": "333333333333333333",
      "status": true,
      "created": ISODate("2013-08-25T13:13:08.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a0453471dee2408000000"),
      "content": "44444444444",
      "status": true,
      "created": ISODate("2013-08-25T13:19:15.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a0585471dee2408000001"),
      "content": "555555555555",
      "status": true,
      "created": ISODate("2013-08-25T13:24:21.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a4d61471deed80900000d"),
      "content": "666666666",
      "status": true,
      "created": ISODate("2013-08-25T18:30:57.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a4d7a471deed80900000e"),
      "content": "99999999999999",
      "status": true,
      "created": ISODate("2013-08-25T18:31:22.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a4e68471deed80900000f"),
      "content": "7777777777777",
      "status": true,
      "created": ISODate("2013-08-25T18:35:20.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a4e6f471deed809000010"),
      "content": "999999999",
      "status": true,
      "created": ISODate("2013-08-25T18:35:27.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a4f26471deeb80900000a"),
      "content": "aaaaaaaaa",
      "status": true,
      "created": ISODate("2013-08-25T18:38:30.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a4f30471deeb80900000b"),
      "content": "bbbbbb",
      "status": true,
      "created": ISODate("2013-08-25T18:38:40.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a4f43471deeb80900000c"),
      "content": "aaaaaaa",
      "status": true,
      "created": ISODate("2013-08-25T18:38:59.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a4f4a471deeb80900000d"),
      "content": "bbbbbbbbb",
      "status": true,
      "created": ISODate("2013-08-25T18:39:06.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a4fa2471deeb80900000e"),
      "content": "aaaaaaaaaaa",
      "status": true,
      "created": ISODate("2013-08-25T18:40:34.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521a4faa471deeb80900000f"),
      "content": "bbbbbbbbbb",
      "status": true,
      "created": ISODate("2013-08-25T18:40:42.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521c4c12471dee100b000000"),
      "content": "999999999",
      "status": true,
      "created": ISODate("2013-08-27T06:49:54.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521f77eb471dee5c11000001"),
      "content": "8888888888",
      "status": true,
      "created": ISODate("2013-08-29T16:33:47.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "deleted": false
    },
    {
      "_id": ObjectId("521f77f7471dee5c11000002"),
      "author": "user1",
      "content": "999999999999",
      "created": ISODate("2013-08-29T16:33:59.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        ""
      ],
      "status": true,
      "updated": ISODate("2013-09-29T04:47:35.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("524fd313471dee880a000003"),
      "author": "user1",
      "content": "fdsafsd",
      "created": ISODate("2013-10-05T08:51:31.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-10-05T08:51:31.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("524fd489471dee9c0a000000"),
      "author": "user1",
      "content": "dfadfas",
      "created": ISODate("2013-10-05T08:57:45.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-10-05T08:57:45.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "content": "&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tThị trường phục hồi với hai chỉ số cùng tăng điểm sau khi giảm khá mạnh. Hnxindex hình thành bộ nến bullish engulfing tăng điểm, tuy nhiên khối lượng giao dịch chỉ đạt 10 triệu cp, sụt giảm mạnh so với phiên trước cho thấy mức độ tin cậy của mẫu hình khá thấp. &amp;nbsp;Trong ngắn hạn, chúng tôi vẫn duy trì quan điểm xu hướng giảm và các chỉ số sẽ gặp áp lực bán mạnh khi tiếp cận ngưỡng kháng cự trong các phiên tới. Vùng kháng cự hiện tại tập trung ở vùng giá 490-492 của chỉ số VNIndex và 61.7-62 của chỉ số HNXIndex. Do đó, nhà đầu tư cần thận trọng với quyết định giải ngân trong giai đoạn này.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Chiến lược giao dịch ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;ul&gt;\r\n\t&lt;li&gt;\r\n\t\tTiếp tục ưu tiên chiến lược hạ tỉ trọng cổ phiếu khi thị trường xuất hiện nhịp tăng ngắn hạn.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tHạn chế mở vị thế mua trong giai đoạn này đến khi chúng tôi đưa ra điểm mua mới.&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n",
  "created": ISODate("2013-08-23T16:53:22.0Z"),
  "deleted": false,
  "description": "Quan điểm kĩ thuật ngắn hạn: Thị trường phục hồi với hai chỉ số cùng tăng điểm sau khi giảm khá mạnh. Hnxindex hình thành bộ nến bullish engulfing tăng [...]",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5f43471deeb40900001f"
  ],
  "slug": "lang-kinh-yestoc-phien-3107-thi-truong-tiem-can-nguong-khang-cu-manh-52179382471deeb408000004",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/52179382471deeb408000005\/avatar.jpg",
  "title": "Lăng kính Yestoc phiên 31\/07: ” Thị trường tiệm cận ngưỡng kháng cự mạnh”",
  "updated": ISODate("2013-10-16T18:31:22.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});

/** cache_post records **/
db.getCollection("cache_post").insert({
  "_id": ObjectId("521a02c7471deed409000004"),
  "created": ISODate("2013-10-05T08:57:45.0Z"),
  "postId": "52179382471deeb408000005",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017",
  "view": NumberInt(0)
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("521a4280471deed809000007"),
  "created": ISODate("2013-08-27T06:50:04.0Z"),
  "view": NumberInt(0),
  "postId": "5216d23b471dee600b000001",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("521a4fba471deeb809000011"),
  "created": ISODate("2013-08-25T18:41:07.0Z"),
  "view": NumberInt(0),
  "postId": "5216d154471dee800a000001",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("521c4ab6471dee200b000001"),
  "created": ISODate("2013-09-01T13:52:22.0Z"),
  "view": NumberInt(0),
  "postId": "5216d1f7471dee840a000003",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("521c4b6b471dee200b000004"),
  "created": ISODate("2013-08-28T16:54:57.0Z"),
  "view": NumberInt(0),
  "postId": "5217929f471dee3c08000001",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("521c4b78471dee200b000006"),
  "created": ISODate("2013-08-29T17:51:48.0Z"),
  "view": NumberInt(0),
  "postId": "5216d192471dee840a000001",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("521e0893471dee8c09000001"),
  "created": ISODate("2013-09-01T06:00:23.0Z"),
  "view": NumberInt(0),
  "postId": "521792d9471deeb408000003",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("521e2abb471dee1409000001"),
  "created": ISODate("2013-09-01T06:00:03.0Z"),
  "view": NumberInt(0),
  "postId": "52179345471deefc0b000001",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("521f2aec471dee200a000002"),
  "created": ISODate("2013-08-29T11:05:16.0Z"),
  "view": NumberInt(0),
  "postId": "5216d281471dee840a000005",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("521f8b51471dee5c11000005"),
  "created": ISODate("2013-08-29T17:57:00.0Z"),
  "view": NumberInt(0),
  "postId": "5216d059471dee740b000001",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52486249471dee740b000001"),
  "created": ISODate("2013-09-29T17:26:27.0Z"),
  "view": NumberInt(0),
  "postId": "52179310471deec003000001",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("524cee4d471dee0c0b000003"),
  "created": ISODate("2013-10-03T04:10:52.0Z"),
  "view": NumberInt(0),
  "postId": "524cee4c471dee0c0b000002",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("524cf35e471deecc0a000002"),
  "created": ISODate("2013-10-03T04:32:30.0Z"),
  "view": NumberInt(0),
  "postId": "524cf35e471deecc0a000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
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
db.getCollection("design_layout").insert({
  "_id": ObjectId("52051a16471dee900a000001"),
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
  "name": "Comment of User",
  "path": "user\/comment"
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
    
  ],
  "slug": "group-1-520cef1a471deeec08000004",
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
      "author": "user1",
      "category": {
        "$ref": "branch_category",
        "$id": ObjectId("51d3d112d874591406000003"),
        "$db": "yesocl"
      },
      "comments": [
        {
          "_id": ObjectId("520cef52471deef808000001"),
          "author": "user1",
          "content": "bbbbbbbbbbb",
          "created": ISODate("2013-08-15T15:10:10.0Z"),
          "email": "quangthi_90@yahoo.com.vn",
          "status": true,
          "updated": ISODate("2013-08-16T17:11:20.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("518f5555471deea409000000"),
            "$db": "yesocl"
          }
        }
      ],
      "content": "&lt;p&gt;\r\n\t&lt;em&gt;Chúng tôi dự báo thị trường sữa của Việt Nam sẽ tăng trưởng với tốc độ CAGR 17,3% trong 3 năm tới.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Chúng tôi cũng tin tưởng VNM có thể duy trì được tốc độ tăng trưởng doanh thu trên 20%\/năm nhờ giành thêm được thị phần.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Chúng tôi kỳ vọng tăng trưởng trong tương lai của VNM sẽ dựa trên 4 nhóm sản phẩm chính.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Xuất khẩu cũng sẽ là động lực tăng trưởng vững của VNM nhưng chúng tôi cho rằng sẽ không có sự đột biến thần kỳ trong hoạt động này.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Chúng tôi cũng kỳ vọng VNM sẽ có hoạt động M&amp;amp;A quy mô nhỏ tại Việt Nam và nước ngoài.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Tỷ suất lợi nhuận gộp nhiều khả năng đã đạt cao nhất là 36,5% vào 2009 và năm nay sẽ giảm do chi phí đầu vào tăng.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Tỷ suất lợi nhuận sẽ ổn định những năm sau đó và chủ yếu chịu ảnh hưởng của biến động của chi phí đầu vào.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Tiền mặt sẽ tăng lên kể từ năm nay vì các hoạt động đầu tư của công ty hiện đã gần như hoàn tất.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Và chúng tôi kỳ vọng tỷ lệ chi trả cổ tức trên lợi nhuận sẽ tăng dần lên 50%.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Hiện room dành cho NĐTNN của cổ phiếu VNM đã hết nhưng có thể sẽ được nới vào năm 2014.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Định giá cổ phiếu VNM vẫn hợp lý và nếu so với bình quân các doanh nghiệp cùng ngành thì giá cổ phiếu VNM vẫn còn tiềm năng tăng.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Hiện P\/E dự phóng 2013 của cổ phiếu VNM là 17,4 lần và P\/B là 6,1 lần. Chúng tôi tiếp tục duy trì đánh giá Khả quan đối với cổ phiếu VNM.&lt;\/em&gt;&lt;\/p&gt;\r\n",
      "created": ISODate("2013-07-19T19:20:07.0Z"),
      "email": "quangthi_90@yahoo.com.vn",
      "slug": "ctcp-sua-viet-nam-vnm-hsx-uoc-kqkd-6-thang-va-trien-vong-kqkd-2013amp-2014-tiep-tuc-duy-tri-danh-gia-kha-quan-520e59ef471deea00b000000",
      "status": true,
      "thumb": "data\/catalog\/group\/51deaf34471deec009000002\/post\/51e99167471dee280a000002\/avatar.jpg",
      "title": "CTCP sữa Việt Nam (VNM – HSX): Ước KQKD 6 tháng và triển vọng KQKD 2013&amp;2014. Tiếp tục duy trì đánh giá Khả quan",
      "updated": ISODate("2013-08-16T17:11:20.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "slug": "group-2-520cef21471deeec08000005",
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
  "_id": ObjectId("518f5f43471deeb40900001f"),
  "avatar": "data\/catalog\/user\/518f5f43471deeb40900001f\/avatar.jpg",
  "created": ISODate("2013-05-12T09:22:11.0Z"),
  "emails": [
    {
      "_id": ObjectId("520677de471dee880b000013"),
      "email": "user2@test.com",
      "primary": true
    }
  ],
  "friendRequests": [
    
  ],
  "friends": [
    {
      "_id": ObjectId("526808ef471dee4009000000"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("516b4a91913db43009000000"),
    "$db": "yesocl"
  },
  "meta": {
    "_id": ObjectId("520677de471dee880b00000a"),
    "firstname": "user2",
    "lastname": "yesocl",
    "birthday": ISODate("2013-08-10T17:26:54.0Z"),
    "sex": NumberInt(1),
    "headingLine": "Unum falli aperiri id pro. Ex impetus invenire eam.",
    "location": {
      "_id": ObjectId("520677de471dee880b00000b"),
      "location": "HCM, Việt Nam",
      "cityId": "5143bfca913db4a408000012"
    },
    "postalCode": "84",
    "industry": "Chemicals",
    "industry_id": "514b0970913db4ac08000020",
    "address": "129\/6\/5 Lê Văn Thọ F11 Gò Vấp",
    "ims": [
      {
        "_id": ObjectId("520677de471dee880b00000c"),
        "im": "user2",
        "type": "skype",
        "visible": "myfollow"
      }
    ],
    "phones": [
      {
        "_id": ObjectId("520677de471dee880b00000d"),
        "phone": "0904000444",
        "type": "mobile",
        "visible": "myfollow"
      }
    ],
    "websites": [
      {
        "_id": ObjectId("520677de471dee880b00000e"),
        "url": "www.yesocl.com",
        "title": ""
      }
    ],
    "background": {
      "_id": ObjectId("520677de471dee880b00000f"),
      "experiencies": [
        {
          "_id": ObjectId("520677de471dee880b000010"),
          "company": "Yesocl",
          "title": "My Company",
          "location": {
            "_id": ObjectId("520677de471dee880b000011"),
            "location": "HCM, Việt Nam",
            "cityId": "5143bfca913db4a408000012"
          },
          "started": ISODate("2013-01-01T18:26:54.0Z"),
          "ended": ISODate("2013-01-01T18:26:54.0Z"),
          "current": false,
          "description": "Sed et utamur argumentum. Eum an habeo ubique efficiantur. Eu sea oporteat vituperatoribus, eos in graecis delicata persecuti. Mel an summo dicit eleifend. Copiosae quaestio mandamus vim et."
        }
      ],
      "educations": [
        {
          "_id": ObjectId("520677de471dee880b000012"),
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
    {
      "_id": ObjectId("5205197f471dee900a000000"),
      "author": "user1",
      "content": "&lt;p&gt;\r\n\tEos blandit gloriatur id. Mel ea vero prodesset, ex sit minimum recusabo praesent. Option accusam copiosae vis ne, mea no omnis quaestio. Conceptam philosophia an mel.&lt;br \/&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n",
      "created": ISODate("2013-08-09T16:31:59.0Z"),
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "thumb": "data\/catalog\/user\/518f5f43471deeb40900001f\/post\/5205197f471dee900a000000\/avatar.jpg",
      "title": "Lorem ipsum dolor sit amet, nec veniam convenire an, vidit mollis alterum mel ad.",
      "updated": ISODate("2013-08-09T16:33:42.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "refreshIds": [
    
  ],
  "salt": "dc1668c45",
  "slug": "user2",
  "status": true,
  "username": "user2"
});
db.getCollection("user").insert({
  "_id": ObjectId("518f5555471deea409000000"),
  "avatar": "data\/catalog\/user\/518f5555471deea409000000\/avatar.jpg",
  "created": ISODate("2013-05-12T08:39:48.0Z"),
  "emails": [
    {
      "_id": ObjectId("526812ba471dee3805000001"),
      "email": "quangthi_90@yahoo.com.vn",
      "primary": true
    },
    {
      "_id": ObjectId("526812ba471dee3805000002"),
      "email": "lqthi.khtn@gmail.com",
      "primary": false
    }
  ],
  "friends": [
    {
      "_id": ObjectId("526808ef471dee4009000001"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("526808ff471deec406000001"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("525bd847471deea808000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5268090e471dee7807000001"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("525ed884471dee780b000014"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5268091d471dee5408000001"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("525ed8ee471dee580b000005"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5268092a471dee5408000003"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("52601121471dee680b000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52680940471dee7807000003"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("5260e5b4471dee6c08000000"),
        "$db": "yesocl"
      }
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("516b4a91913db43009000000"),
    "$db": "yesocl"
  },
  "meta": {
    "_id": ObjectId("526808b4471dee880b000000"),
    "address": "129\/6\/5 Lê Văn Thọ F11 Gò Vấp",
    "background": {
      "_id": ObjectId("526808b4471dee880b000007"),
      "educations": [
        {
          "_id": ObjectId("526808b4471dee880b000008"),
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
        },
        {
          "_id": ObjectId("526808b4471dee880b000009"),
          "school": "Nguyễn Công Trứ",
          "school_id": "",
          "started": "2006",
          "ended": "2008",
          "degree": "Trung học Phổ Thông",
          "degree_id": "",
          "fieldOfStudy": "Học sinh",
          "fieldOfStudy_id": "",
          "grace": "",
          "societies": "",
          "description": ""
        }
      ],
      "interest": "",
      "maritalStatus": false,
      "adviceForContact": "",
      "sumary": "abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz abc xyz"
    },
    "birthday": ISODate("1990-08-13T18:17:30.0Z"),
    "firstname": "bommer",
    "headingLine": "",
    "ims": [
      {
        "_id": ObjectId("526808b4471dee880b000002"),
        "im": "user1",
        "type": "skype",
        "visible": "myfollow"
      }
    ],
    "industry": "Design",
    "industry_id": "514b0983913db4ac08000021",
    "lastname": "luu",
    "location": {
      "_id": ObjectId("526812ba471dee3805000000"),
      "location": "HCM, Việt Nam",
      "cityId": "5143bfca913db4a408000012"
    },
    "phones": [
      {
        "_id": ObjectId("526812ba471dee3805000003"),
        "phone": "0903000333",
        "type": "mobile"
      },
      {
        "_id": ObjectId("526812ba471dee3805000004"),
        "phone": "0328492842",
        "type": "mobile"
      },
      {
        "_id": ObjectId("526812ba471dee3805000005"),
        "phone": "01265327779",
        "type": "telephone"
      }
    ],
    "postalCode": "84",
    "sex": NumberInt(1),
    "websites": [
      {
        "_id": ObjectId("526808b4471dee880b000006"),
        "url": "www.yesocl.com",
        "title": ""
      }
    ]
  },
  "password": "918ee61c3343e557ef1e75672fca90da58d8ce06",
  "posts": [
    {
      "_id": ObjectId("51eeb4aa471dee2c0b000004"),
      "author": "user1",
      "comments": [
        {
          "_id": ObjectId("52051af7471dee680a000001"),
          "author": "user1",
          "content": "aaaaaaaaaaa",
          "created": ISODate("2013-08-09T16:38:15.0Z"),
          "email": "quangthi_90@yahoo.com.vn",
          "status": true,
          "updated": ISODate("2013-08-16T17:13:37.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("518f5555471deea409000000"),
            "$db": "yesocl"
          }
        }
      ],
      "content": "&lt;p&gt;\r\n\t&lt;strong&gt;&lt;span style=&quot;text-decoration: underline;&quot;&gt;Vnindex:&lt;\/span&gt;&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Phiên 18\/6 đóng cửa hồi phục nhẹ=&amp;gt; tín hiệu tích cực trong ngắn hạn.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Vùng hỗ trợ: trendlin 485-490 đ. Thủng vùng này, ngưỡng hỗ trợ gần nhất là 462-468.5 đ&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Trường hợp không thủng 485-490. Để xác nhận lại xu hướng tăng, thị trường cần vượt qua ngưỡng cản 515 – 517.5 đ.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;strong&gt;&lt;span style=&quot;text-decoration: underline;&quot;&gt;Chiến lược:&lt;\/span&gt;&lt;\/strong&gt; dừng bán đuổi ( trừ trường hợp thủng 485 =&amp;gt; bắt buộc bán cắt lỗ). Những phiên tới thị trường hồi phục lên vùng 505-511 đ canh bán bớt giãm tỷ trọng cổ phiếu về mức an toàn đặc biệt đối với những mã tăng nóng thời gian qua cần bán hết thanh lý danh mục, nếu thị trường vượt 515-517.5 đ có thể cơ cấu sang những mã tốt chưa tăng nhiều.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;strong&gt;&lt;span style=&quot;text-decoration: underline;&quot;&gt;Danh mục:&lt;\/span&gt;&lt;\/strong&gt; VNM, BMP, PVD, KHP, HLD, GAS, LIX&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/06\/vnindex-19.png&quot; rel=&quot;attachment wp-att-2937&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignnone  wp-image-2937&quot; height=&quot;377&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/06\/vnindex-19.png&quot; title=&quot;huynh khac  minh - vnindex - yestoc - smart_money&quot; width=&quot;605&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t———————————-&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tHuỳnh Khắc Minh&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tYahoo: business_hkm&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tEmail: minh.hk83@gmail.com&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tSkype: minh.trang02&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tHp: 0916 31 8868&lt;\/p&gt;\r\n",
      "created": ISODate("2013-07-23T16:51:54.0Z"),
      "email": "quangthi_90@yahoo.com.vn",
      "slug": "phan-tich-nhan-dinh-thi-truong-truoc-phien-giao-dich-19062013-520e5db7471dee900b000007",
      "status": true,
      "thumb": "data\/catalog\/user\/518f5555471deea409000000\/post\/51eeb4aa471dee2c0b000004\/avatar.jpg",
      "title": "Phân tích, nhận định thị trường trước phiên giao dịch 19\/06\/2013",
      "updated": ISODate("2013-08-16T17:13:37.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "refreshIds": [
    
  ],
  "salt": "09b2a07c9",
  "slug": "user1",
  "status": true,
  "username": "user1"
});
db.getCollection("user").insert({
  "_id": ObjectId("525bd847471deea808000000"),
  "avatar": "data\/catalog\/user\/525bd847471deea808000000\/avatar.png",
  "created": ISODate("2013-10-14T11:40:55.0Z"),
  "emails": [
    {
      "_id": ObjectId("525bd847471deea808000002"),
      "email": "user3@test.com",
      "primary": true
    }
  ],
  "friendRequests": [
    
  ],
  "friends": [
    {
      "_id": ObjectId("526808fe471deec406000000"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("516b4a91913db43009000000"),
    "$db": "yesocl"
  },
  "meta": {
    "_id": ObjectId("525bd847471deea808000001"),
    "firstname": "Bommer",
    "lastname": "Luu",
    "birthday": ISODate("1990-08-12T22:00:00.0Z"),
    "sex": NumberInt(1)
  },
  "password": "38cd494f4e20391887704da2c512fb7e9a8efe9c",
  "refreshIds": [
    
  ],
  "salt": "62df54b25",
  "slug": "user-temp",
  "status": true
});
db.getCollection("user").insert({
  "_id": ObjectId("525ed884471dee780b000014"),
  "avatar": "data\/catalog\/user\/525ed884471dee780b000014\/avatar.png",
  "created": ISODate("2013-10-16T18:18:44.0Z"),
  "emails": [
    {
      "_id": ObjectId("525ed884471dee780b000016"),
      "email": "user5@test.com",
      "primary": true
    }
  ],
  "friendRequests": [
    
  ],
  "friends": [
    {
      "_id": ObjectId("5268090e471dee7807000000"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("516b4a91913db43009000000"),
    "$db": "yesocl"
  },
  "meta": {
    "_id": ObjectId("525ed884471dee780b000015"),
    "firstname": "L232e",
    "lastname": "Văn",
    "birthday": ISODate("2000-12-31T23:00:00.0Z"),
    "sex": NumberInt(1)
  },
  "password": "56f5dbcf245d438c456c6a87e6d5378353b4ffbe",
  "refreshIds": [
    
  ],
  "salt": "0a64345ba",
  "slug": "user-temp-1",
  "status": true
});
db.getCollection("user").insert({
  "_id": ObjectId("525ed8ee471dee580b000005"),
  "avatar": "data\/catalog\/user\/525ed8ee471dee580b000005\/avatar.jpg",
  "created": ISODate("2013-10-16T18:20:30.0Z"),
  "emails": [
    {
      "_id": ObjectId("525ed8ee471dee580b000007"),
      "email": "user6@test.com",
      "primary": true
    }
  ],
  "friendRequests": [
    
  ],
  "friends": [
    {
      "_id": ObjectId("5268091d471dee5408000000"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("516b4a91913db43009000000"),
    "$db": "yesocl"
  },
  "meta": {
    "_id": ObjectId("525ed8ee471dee580b000006"),
    "firstname": "abc",
    "lastname": "xyz",
    "birthday": ISODate("2008-05-04T22:00:00.0Z"),
    "sex": NumberInt(3)
  },
  "password": "dbbe1a2258e45a1bb6f741d685a0de2b43f836ca",
  "refreshIds": [
    
  ],
  "salt": "a87e4d797",
  "slug": "user-temp-2",
  "status": true
});
db.getCollection("user").insert({
  "_id": ObjectId("52601121471dee680b000000"),
  "avatar": "data\/catalog\/user\/52601121471dee680b000000\/avatar.jpg",
  "created": ISODate("2013-10-17T16:32:33.0Z"),
  "emails": [
    {
      "_id": ObjectId("52601121471dee680b000002"),
      "email": "user7@test.com",
      "primary": true
    }
  ],
  "friendRequests": [
    
  ],
  "friends": [
    {
      "_id": ObjectId("5268092a471dee5408000002"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("516b4a91913db43009000000"),
    "$db": "yesocl"
  },
  "meta": {
    "_id": ObjectId("52601121471dee680b000001"),
    "firstname": "Bommer",
    "lastname": "Luu",
    "birthday": ISODate("2010-06-02T22:00:00.0Z"),
    "sex": NumberInt(1)
  },
  "password": "248f2093c0f2f6049950cbf42a51927cb028408a",
  "refreshIds": [
    
  ],
  "salt": "fc48b431c",
  "slug": "user-temp-3",
  "status": true
});
db.getCollection("user").insert({
  "_id": ObjectId("5260e5b4471dee6c08000000"),
  "avatar": "data\/catalog\/user\/5260e5b4471dee6c08000000\/avatar.jpg",
  "created": ISODate("2013-10-18T07:39:31.0Z"),
  "emails": [
    {
      "_id": ObjectId("5260e5b4471dee6c08000002"),
      "email": "user8@test.com",
      "primary": true
    }
  ],
  "friendRequests": [
    
  ],
  "friends": [
    {
      "_id": ObjectId("52680940471dee7807000002"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("516b4a91913db43009000000"),
    "$db": "yesocl"
  },
  "meta": {
    "_id": ObjectId("5260e5b4471dee6c08000001"),
    "firstname": "Bommer",
    "lastname": "Luu",
    "birthday": ISODate("2009-04-03T22:00:00.0Z"),
    "sex": NumberInt(2)
  },
  "password": "1c3b43d60529ff6cc7e24c1e65595acdf596fbba",
  "refreshIds": [
    
  ],
  "salt": "7b748a1b1",
  "slug": "user-temp-4",
  "status": true
});

/** user_group records **/
db.getCollection("user_group").insert({
  "_id": ObjectId("516b4a91913db43009000000"),
  "name": "Default"
});

/** user_post records **/
db.getCollection("user_post").insert({
  "_id": ObjectId("52486543471dee340b000003"),
  "posts": [
    {
      "_id": ObjectId("52486543471dee340b000004"),
      "content": "1. abc",
      "status": true,
      "created": ISODate("2013-09-29T17:37:07.0Z"),
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "52486543471dee340b000002",
      "deleted": false
    },
    {
      "_id": ObjectId("5248654a471dee340b000006"),
      "content": "2. abc",
      "status": true,
      "created": ISODate("2013-09-29T17:37:14.0Z"),
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "5248654a471dee340b000005",
      "deleted": false
    },
    {
      "_id": ObjectId("52486551471dee340b000008"),
      "content": "3. abc",
      "status": true,
      "created": ISODate("2013-09-29T17:37:21.0Z"),
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "52486551471dee340b000007",
      "deleted": false
    },
    {
      "_id": ObjectId("52486564471dee340b00000a"),
      "title": "4. abc",
      "content": "content abc&lt;br&gt;",
      "status": true,
      "created": ISODate("2013-09-29T17:37:40.0Z"),
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "4-abc-52486564471dee340b000009",
      "deleted": false
    }
  ],
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5f43471deeb40900001f"),
    "$db": "yesocl"
  }
});
db.getCollection("user_post").insert({
  "_id": ObjectId("524cee4c471dee0c0b000001"),
  "posts": [
    {
      "_id": ObjectId("524cee4c471dee0c0b000002"),
      "author": "user1",
      "content": "&lt;p&gt;\r\n\tLorem ipsum dolor sit amet, quas essent iisque ex quo, in aliquip perpetua voluptatibus pro, sea no cibo delenit maiorum. Oratio forensibus an nam, in mollis deleniti sed. In mel bonorum postulant. Esse eruditi efficiantur vis id. Vel ei mutat labitur inimicus, liber philosophia ut sit. Etiam dicam lobortis mea ut, mel et sumo diam contentiones. Usu an posse invenire signiferumque, vel tale iudico id, ex nam etiam graece reformidans.&lt;\/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;\r\n\t&lt;img src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2012\/12\/ck-65.jpg&quot; \/&gt;&lt;br \/&gt;\r\n\tEst ludus soluta at, ius nulla mandamus eu. Eu has nostro facilisis. Ea vocent consequat suscipiantur nam. Viderer delicata duo ei, has omnis solum putent no. Ne labores invidunt sed. Fastidii scriptorem eos in, quo ne utroque lucilius. Dico facilisis et mei, ex nam erat ipsum.&lt;br \/&gt;\r\n\t&lt;br \/&gt;\r\n\tAn meis habemus theophrastus eam. Legimus antiopam eloquentiam at qui, ei menandri lobortis nam. An vidisse saperet pri. Te eum eros mediocritatem. Vis possit graeco ornatus at, purto deleniti te mea. Vis cu case noster, an nam partem perfecto posidonium, duo delectus electram voluptatum at.&lt;br \/&gt;\r\n\t&lt;br \/&gt;\r\n\tSea an causae veritus. Nec minim ignota volumus et, melius laboramus nam eu. No viris ignota sit, id oporteat inimicus imperdiet vim. Ei nibh honestatis vix, vivendum verterem contentiones nec at. Ne sale iisque albucius ius.&lt;\/p&gt;\r\n",
      "created": ISODate("2013-10-03T04:10:52.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "slug": "1-lorem-ipsum-dolor-sit-amet-vix-nisl-repudiandae-vituperatoribus-524cee4c471dee0c0b000000",
      "status": true,
      "thumb": "data\/catalog\/user\/518f5555471deea409000000\/post\/524cee4c471dee0c0b000002\/avatar.jpg",
      "title": "1. Lorem ipsum dolor sit amet, vix nisl repudiandae vituperatoribus",
      "updated": ISODate("2013-10-03T04:15:35.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("524cf35e471deecc0a000001"),
      "author": "user1",
      "content": "&lt;p&gt;\r\n\tLorem ipsum dolor sit amet, quas essent iisque ex quo, in aliquip perpetua voluptatibus pro, sea no cibo delenit maiorum. Oratio forensibus an nam, in mollis deleniti sed. In mel bonorum postulant. Esse eruditi efficiantur vis id. Vel ei mutat labitur inimicus, liber philosophia ut sit. Etiam dicam lobortis mea ut, mel et sumo diam contentiones. Usu an posse invenire signiferumque, vel tale iudico id, ex nam etiam graece reformidans.&lt;br \/&gt;\r\n\t&lt;br \/&gt;\r\n\tEst ludus soluta at, ius nulla mandamus eu. Eu has nostro facilisis. Ea vocent consequat suscipiantur nam. Viderer delicata duo ei, has omnis solum putent no. Ne labores invidunt sed. Fastidii scriptorem eos in, quo ne utroque lucilius. Dico facilisis et mei, ex nam erat ipsum.&lt;br \/&gt;\r\n\t&lt;br \/&gt;\r\n\tAn meis habemus theophrastus eam. Legimus antiopam eloquentiam at qui, ei menandri lobortis nam. An vidisse saperet pri. Te eum eros mediocritatem. Vis possit graeco ornatus at, purto deleniti te mea. Vis cu case noster, an nam partem perfecto posidonium, duo delectus electram voluptatum at.&lt;br \/&gt;\r\n\t&lt;br \/&gt;\r\n\tSea an causae veritus. Nec minim ignota volumus et, melius laboramus nam eu. No viris ignota sit, id oporteat inimicus imperdiet vim. Ei nibh honestatis vix, vivendum verterem contentiones nec at. Ne sale iisque albucius ius.&lt;br \/&gt;\r\n\t&lt;br \/&gt;\r\n\tMei et eleifend iudicabit. No vero nemore adolescens pro, mel ad inermis torquatos concludaturque. No nullam integre iuvaret qui, ei sed invenire volutpat dissentiet, vim ea facer error. Cum dico ipsum quaerendum at, mei nisl vivendum ex.&lt;\/p&gt;\r\n",
      "created": ISODate("2013-10-03T04:32:30.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "slug": "bmdesign-tu-van-thiet-ke-website-524cf35e471deecc0a000000",
      "status": true,
      "thumb": "data\/catalog\/user\/518f5555471deea409000000\/post\/524cf35e471deecc0a000001\/avatar.jpg",
      "title": "[BmDesign] - Tư vấn thiết kế Website",
      "updated": ISODate("2013-10-03T10:01:13.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("524d939e471deed00b000001"),
      "content": "abc",
      "status": true,
      "created": ISODate("2013-10-03T15:56:14.0Z"),
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "524d939e471deed00b000000",
      "deleted": false
    },
    {
      "_id": ObjectId("524d93a9471deed00b000003"),
      "content": "aaaa",
      "status": true,
      "created": ISODate("2013-10-03T15:56:25.0Z"),
      "author": "user1",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "524d93a9471deed00b000002",
      "deleted": false
    }
  ],
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});

/** ward records **/
