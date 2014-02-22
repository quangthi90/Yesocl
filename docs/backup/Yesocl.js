
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

/** social_network indexes **/
db.getCollection("social_network").ensureIndex({
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

/** user_friend indexes **/
db.getCollection("user_friend").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** user_group indexes **/
db.getCollection("user_group").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** user_message indexes **/
db.getCollection("user_message").ensureIndex({
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
      "_id": ObjectId("52fa7537471deee00a000001"),
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
      "_id": ObjectId("52fa7537471deee00a000002"),
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
      "_id": ObjectId("52fa7537471deee00a000003"),
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
    },
    {
      "_id": ObjectId("52fa7537471deee00a000004"),
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
      "_id": ObjectId("52fa7537471deee00a000005"),
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
      "_id": ObjectId("52fa7537471deee00a000006"),
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
      "_id": ObjectId("52fa7537471deee00a000007"),
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
      "_id": ObjectId("52fa7537471deee00a000008"),
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
      "_id": ObjectId("52fa7537471deee00a000009"),
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
      "_id": ObjectId("52fa7537471deee00a00000a"),
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
      "_id": ObjectId("52fa7537471deee00a00000b"),
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
      "_id": ObjectId("52fa7537471deee00a00000c"),
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
      "_id": ObjectId("52fa7537471deee00a00000d"),
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
      "_id": ObjectId("52fa7537471deee00a00000e"),
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
      "_id": ObjectId("52fa7537471deee00a00000f"),
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
      "_id": ObjectId("52fa7537471deee00a000010"),
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
      "_id": ObjectId("52fa7537471deee00a000011"),
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
      "_id": ObjectId("52fa7537471deee00a000012"),
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
      "_id": ObjectId("52fa7537471deee00a000013"),
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
      "_id": ObjectId("52fa7537471deee00a000014"),
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
      "_id": ObjectId("52fa7537471deee00a000015"),
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
      "_id": ObjectId("52fa7537471deee00a000016"),
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
      "_id": ObjectId("52fa7537471deee00a000017"),
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
      "_id": ObjectId("52fa7537471deee00a000018"),
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
      "_id": ObjectId("52fa7537471deee00a000019"),
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
      "_id": ObjectId("52fa7537471deee00a00001a"),
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
      "_id": ObjectId("52fa7537471deee00a00001b"),
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
      "_id": ObjectId("52fa7537471deee00a00001c"),
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
      "_id": ObjectId("52fa7537471deee00a00001d"),
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
      "_id": ObjectId("52fa7537471deee00a00001e"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("52694e2a471deed008000000"),
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
      "_id": ObjectId("52fa7537471deee00a00001f"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("52c27386471deed40a000000"),
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
          "$id": ObjectId("516a62b2471dee480b000006"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("52c275f2471dee640a00000a"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("52c275ff471dee640a00000c"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("52c27609471dee640a00000e"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("52c27929471deecc0a000000"),
          "$db": "yesocl"
        }
      ]
    },
    {
      "_id": ObjectId("52fa7537471deee00a000020"),
      "layout": {
        "$ref": "design_layout",
        "$id": ObjectId("52fa7524471deee00a000000"),
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
  "logo": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/avatar.jpg",
  "members": [
    {
      "$ref": "user",
      "$id": ObjectId("518f5555471deea409000000"),
      "$db": "yesocl"
    }
  ],
  "name": "Chứng khoán",
  "order": NumberInt(0),
  "slug": "yestoc-520ce99c471dee9c09000000",
  "status": true
});
db.getCollection("branch").insert({
  "_id": ObjectId("5247a0a3471dee280c000037"),
  "company": {
    "$ref": "company",
    "$id": ObjectId("51e97c88471dee180a000000"),
    "$db": "yesocl"
  },
  "logo": "data\/catalog\/branch\/5247a0a3471dee280c000037\/avatar.jpg",
  "members": [
    {
      "$ref": "user",
      "$id": ObjectId("518f5555471deea409000000"),
      "$db": "yesocl"
    }
  ],
  "name": "IT",
  "order": NumberInt(1),
  "slug": "it-5247a0a3471dee280c000036",
  "status": true
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
  "_id": ObjectId("5216d281471dee840a000005"),
  "author": "Quang Thi",
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
      "author": "user1",
      "content": "        koi0ol Edited",
      "created": ISODate("2013-08-28T14:16:42.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000",
        "",
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2013-12-09T11:52:43.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("521f2aec471dee200a000001"),
      "author": "user1",
      "content": "        111111111111 &lt;u&gt;Edited&lt;\/u&gt;",
      "created": ISODate("2013-08-29T11:05:16.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000",
        "",
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2013-12-09T11:53:10.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd46c471deef40b000002"),
      "author": "Quang Thi",
      "content": "3333333333",
      "created": ISODate("2013-11-09T06:21:32.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2013-12-17T10:24:28.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd4b2471deee80b000000"),
      "author": "Quang Thi",
      "content": "        444444444444 &lt;u&gt;Edited&lt;\/u&gt;",
      "created": ISODate("2013-11-09T06:22:42.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2013-12-17T10:24:30.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd4ba471deee80b000001"),
      "author": "Quang Thi",
      "content": "555555555555",
      "created": ISODate("2013-11-09T06:22:50.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000",
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2014-01-06T16:22:36.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd4c0471deee80b000002"),
      "author": "Quang Thi",
      "content": "666666666666666",
      "created": ISODate("2013-11-09T06:22:56.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2014-01-06T16:22:37.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd5a0471deee40b000003"),
      "author": "Quang Thi",
      "content": "777777777777",
      "created": ISODate("2013-11-09T06:26:40.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2014-01-06T16:22:38.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd711471deee40b000005"),
      "author": "Quang Thi",
      "content": "88888888888888",
      "created": ISODate("2013-11-09T06:32:49.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:32:49.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd779471deee40b000007"),
      "author": "Quang Thi",
      "content": "999999999",
      "created": ISODate("2013-11-09T06:34:33.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:34:33.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddc81471deee40b00001e"),
      "author": "Quang Thi",
      "content": "1000000000000000000",
      "created": ISODate("2013-11-09T06:56:01.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:56:01.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dedb2471deef40b000006"),
      "author": "Quang Thi",
      "content": "1100000000",
      "created": ISODate("2013-11-09T08:09:22.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T08:09:23.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5291fd72471deeec0a000002"),
      "author": "Quang Thi",
      "content": "1200000000000000",
      "created": ISODate("2013-11-24T13:21:54.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-24T13:21:54.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5292076a471deeec0a000004"),
      "author": "Quang Thi",
      "content": "130000000000",
      "created": ISODate("2013-11-24T14:04:26.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-24T14:04:26.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "content": "&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Gần đây đã có bài báo viết về việc SJS (đánh giá Kém khả quan) phải đối mặt với nguy cơ hủy niêm yết trong năm sau nếu công ty tiếp tục lỗ trong năm 2013.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Hiện tại, chúng tôi cho rằng khả năng hủy niêm yết là khá thấp.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Chúng tôi cho rằng trong năm 2013, SJS sẽ lãi nhẹ nhờ ghi nhận lợi nhuận từ đất tại dự án Nam An Khánh đã bán trong năm 2011.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Và để có thể ghi nhận lợi nhuận, SJS chỉ cần hoàn thành phần nền móng của phần diện tích đã bán.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Tuy nhiên, công ty vẫn nợ nhiều với khoảng 1 nghìn tỷ đồng nợ gốc và lãi đến hạn thanh toán trong năm 2013.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Chúng tôi cho rằng SJS sẽ xin giãn nợ để không phải gán nợ khoảng 10ha đất.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Dựa trên dự báo của chúng tôi, giá cổ phiếu SJS thấp hơn 30% so với NAV; P\/E dự phóng là 42,4 lần và P\/B 1,3 lần.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Chúng tôi tiếp tục duy trì đánh giá Kém khả quan.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tQuý khách hàng có thể truy cập “Báo cáo ngắn” về CTCP Đầu tư Phát triển Đô thị và KCN Sông Đà_Mã chứng khoán: SJS – HSX (cập nhật ngày 11\/3\/2013) bằng cách truy cập đường dẫn sau đây &lt;a href=&quot;https:\/\/www.hsc.com.vn\/hscportal\/downloadFile?fileid=173987&quot; target=&quot;_blank&quot;&gt;https:\/\/www.hsc.com.vn\/&lt;wbr \/&gt;hscportal\/downloadFile?fileid=&lt;wbr \/&gt;173987&lt;\/a&gt;&lt;\/p&gt;\r\n",
  "countViewer": NumberInt(9),
  "created": ISODate("2013-08-23T03:09:53.0Z"),
  "deleted": false,
  "description": "Gần đây đã có bài báo viết về việc SJS (đánh giá Kém khả quan) phải đối mặt với nguy cơ hủy niêm yết trong năm sau nếu công [...]",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5f43471deeb40900001f",
    "518f5555471deea409000000"
  ],
  "slug": "bao-cao-ngan-ve-cong-ty-cong-ty-co-phan-dau-tu-phat-trien-do-thi-va-khu-cong-nghiep-song-da-sjs-5216d281471dee840a000004",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/5216d281471dee840a000005\/avatar.jpg",
  "title": "“Báo cáo ngắn” về Công ty Công ty Cổ phần Đầu tư Phát triển Đô thị và Khu Công nghiệp Sông Đà (SJS)",
  "updated": ISODate("2014-02-11T08:20:26.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("5216d192471dee840a000001"),
  "author": "Quang Thi",
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
    },
    {
      "_id": ObjectId("527dd5bd471deee40b000004"),
      "author": "Quang Thi",
      "content": "4444444444444",
      "created": ISODate("2013-11-09T06:27:09.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:27:10.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd71a471deee40b000006"),
      "author": "Quang Thi",
      "content": "5555555555555",
      "created": ISODate("2013-11-09T06:32:58.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:32:58.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddd09471deee40b000023"),
      "author": "Quang Thi",
      "content": "6666666666",
      "created": ISODate("2013-11-09T06:58:17.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:58:17.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddd38471deee40b000025"),
      "author": "Quang Thi",
      "content": "7777777777777777",
      "created": ISODate("2013-11-09T06:59:04.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:59:04.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dddbd471deee40b000029"),
      "author": "Quang Thi",
      "content": "888888888888888",
      "created": ISODate("2013-11-09T07:01:17.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T07:01:17.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dddf5471deee40b00002b"),
      "author": "Quang Thi",
      "content": "9999999999999999",
      "created": ISODate("2013-11-09T07:02:13.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T07:02:14.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527decdf471deef40b000004"),
      "author": "Quang Thi",
      "content": "100000000000",
      "created": ISODate("2013-11-09T08:05:51.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T08:05:51.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dfedb471deef40b00000c"),
      "author": "Quang Thi",
      "content": "1100000000000",
      "created": ISODate("2013-11-09T09:22:35.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T09:22:35.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dfef3471deef40b00000d"),
      "author": "Quang Thi",
      "content": "12000000000",
      "created": ISODate("2013-11-09T09:22:59.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T09:22:59.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52a417f6471dee440b000000"),
      "author": "Quang Thi",
      "content": "130000000000000",
      "created": ISODate("2013-12-08T06:55:50.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-12-08T06:55:51.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "content": "&lt;p&gt;\r\n\tVSC đã tổ chức ĐHCĐTN vào cuối tuần. VSC đặt kế hoạch kinh doanh cho năm nay với doanh thu thuần là 650 tỷ đồng, giảm 17% và lợi nhuận trước thuế là 214 tỷ đồng, giảm 26%. Công ty sẽ trả cổ tức bằng cả cổ phiếu (tỷ lệ 1:5) và tiền mặt (4.000đ\/cp). Chúng tôi cho rằng tiền mặt sẽ được trả sau khi trả bằng cổ phiếu nên tỷ lệ cổ tức\/giá tổng cộng sẽ là 10,3% ở mức giá hiện tại.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tKế hoạch kinh doanh năm 2013 của VSC có vẻ khá thận trọng và đây là điều thường thấy ở công ty này. Chúng tôi thấy rằng trong 5 năm liền (từ 2008-2012), công ty đã vượt kế hoạch lợi nhuận trước thuế đề ra là 46%. Tốc độ tăng trưởng CAGR trong 5 năm của doanh thu là 25% còn của lợi nhuận thuần là 21%. Trong năm nay, VSC đã lý giải việc đặt kế hoạch kinh doanh thấp là do doanh thu từ dịch vụ lưu kho lạnh sẽ giảm do trong năm ngoái doanh thu này đạt cao trong điều kiện đặc biệt. Trong năm 2012, công ty đạt 80 tỷ đồng doanh thu từ dịch vụ lưu kho lạnh, tăng mạnh 43% do chính phủ Trung Quốc đã bất ngờ đóng cửa biên giới trong 3 tháng trong năm 2012 khiến các công ty phải lưu hàng trong kho lạnh trong nhiều tháng. Chúng tôi cũng đã có đề cập đến điều này trong báo cáo trước về VSC.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tVSC hiện đang chạy hết công suất nên sẽ không còn nhiều dư địa để tăng trưởng. Trong năm nay, VSC đặt kế hoạch hàng hóa qua cảng là 350.000 TEU, chỉ tăng 1%. Và chúng tôi cũng dự báo phí dịch vụ sẽ giữ nguyên. VSC đã giữ nguyên phí dịch vụ trong 2 năm và chúng tôi cũng lưu ý là hầu hết phí dịch vụ được tính bằng USD.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tChúng tôi dự báo doanh thu từ hoạt động kinh doanh cảng sẽ đạt 706 tỷ đồng, tăng trưởng 1%; cao hơn kế hoạch của công ty 9%; và dự báo doanh thu từ dịch vụ lưu kho lạnh giảm 30% và đạt 56 tỷ đồng trong năm 2013. Dự báo này dựa trên giả định là hàng thực phẩm đông lạnh sẽ được lưu thông thông suốt qua biên giới Việt – Trung trong năm nay. Tóm lại, chúng tôi dự báo tổng doanh thu là 762 tỷ đồng, giảm nhẹ 2%.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tChúng tôi cũng dự báo lợi nhuận thuần sẽ đạt 228 tỷ đồng, không thay đổi so với năm 2012 và cao hơn 33% so với kế hoạch của công ty. Dự báo lợi nhuận thuần của chúng tôi dựa trên giả định chi phí giảm nhờ công ty giảm sự phụ thuộc vào bên cho thuê bãi container. Năm nay, công ty sẽ xây dựng bãi container của riêng mình với diện tích 7,5ha. Bãi container này sẽ được hoàn thành và đưa vào hoạt động vào Q2 năm nay và sẽ giúp giảm 7% giá vốn hàng bán xuống còn 474 tỷ đồng trong năm 2013. Điều này sẽ giúp tỷ suất lợi nhuận gộp tăng từ mức 34,4% lên 37,8%.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tVSC có kế hoạch tăng vốn điều lệ trong năm nay thông qua phát hành cổ phiếu thưởng nói trên, theo đó sẽ tăng vốn điều lệ từ 240 tỷ đồng lên 288 tỷ đồng từ giữa năm nay. EPS điều chỉnh pha loãng 2013 sẽ là 8.620đ, giảm 10%. Theo mức giá hôm nay, VSC hiện đang giao dịch với P\/E dự phóng là 4,9 lần và P\/B dự phóng là 1,5 lần. VSC có tình hình tài chính tốt với tỷ lệ nợ\/tổng tài sản chỉ ở mức 0,25 lần và tỷ lệ cổ tức\/giá tương đối cao. Tuy nhiên, trước mắt thì công ty dường như không có kế hoạch tăng công suất và do đó khó giữ được tiềm năng tăng trưởng dài hạn. Theo kế hoạch đầu tư mở rộng năm 2013, chúng tôi thấy rằng công ty có vẻ chú trọng vào việc mở rộng bãi container để giảm sự phụ thuộc vào bên thứ ba. Vì vậy, cổ phiếu có nguy cơ mất đi khả năng tăng trưởng nếu công ty không có kế hoạch tăng công suất hoạt động kinh doanh cảng. Cổ phiếu VSC hiện có tỷ lệ cổ tức\/giá khá tốt và định giá thấp theo quan điểm của chúng tôi.&lt;\/p&gt;\r\n",
  "countViewer": NumberInt(0),
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
  "updated": ISODate("2013-12-20T05:49:43.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("5216d0e6471dee700b000001"),
  "author": "Quang Thi",
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
    },
    {
      "_id": ObjectId("527dd9e9471deee40b00000e"),
      "author": "Quang Thi",
      "content": "333333333333",
      "created": ISODate("2013-11-09T06:44:57.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:44:57.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dda77471deee40b000013"),
      "author": "Quang Thi",
      "content": "44444444444",
      "created": ISODate("2013-11-09T06:47:19.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:47:19.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddaa5471deee40b000015"),
      "author": "Quang Thi",
      "content": "555555555555",
      "created": ISODate("2013-11-09T06:48:05.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:48:05.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "content": "&lt;div align=&quot;justify&quot; style=&quot;text-align: justify;&quot;&gt;\r\n\tNgày 1\/6, Ngân hàng Thế giới (WB) tại Hà Nội cho biết: Ban Giám đốc WB đã thông qua hai khoản tín dụng từ Hiệp hội Phát triển Quốc tế (IDA) với tổng trị giá 250 triệu USD cho Dự án hỗ trợ y tế khu vực đồng bằng Sông Hồng và Dự án thúc đẩy sáng tạo thông qua nghiên cứu, khoa học và công nghệ.&lt;a href=&quot;http:\/\/yestoc.com\/wb-phe-duyet-250-trieu-usd-tin-dung-cho-viet-nam\/images-10\/&quot; rel=&quot;attachment wp-att-2741&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;aligncenter size-full wp-image-2741&quot; height=&quot;183&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/06\/images.jpg&quot; title=&quot;images&quot; width=&quot;275&quot; \/&gt;&lt;\/a&gt;\r\n\t&lt;p&gt;\r\n\t\tTrong tổng số tiền được phê duyệt, sẽ dành cho Dự án hỗ trợ y tế khu vực đồng bằng Sông Hồng 150 triệu USD, với mục đích cung cấp các dịch vụ y tế tốt hơn cho 15 triệu người, đặc biệt là trẻ em và phụ nữ, nâng cao hiệu quả và công bằng trong sử dụng dịch vụ bệnh viện tại 13 tỉnh vùng Đông Bắc và đồng bằng Bắc Bộ.&lt;\/p&gt;\r\n\t&lt;p&gt;\r\n\t\tDự án sẽ tăng cường năng lực cho các bệnh viên tỉnh và huyện để cung cấp dịch vụ tốt hơn để bệnh nhân không phải lên Hà Nội và giảm các rào cản tài chính bằng việc mở rộng đối đượng được nhận Thẻ Bảo hiểm y tế cho các hộ gia đình cận nghèo.&lt;\/p&gt;\r\n\t&lt;p&gt;\r\n\t\tDự án thúc đẩy sáng tạo thông qua nghiên cứu, khoa học và công nghệ sẽ được phê duyệt 100 triệu USD nhằm hỗ trợ hoạt động sáng tạo khoa học và công nghệ tại Việt Nam bằng cách thiết kế và thí điểm các chính sách khuyến khích sáng tạo khoa học và công nghệ, tăng cường hiệu quả của các Viện Nghiên cứu và Phát triển (R&amp;amp;D), khuyến khích sự phát triển của các doanh nghiệp công nghệ sáng tạo.&lt;\/p&gt;\r\n\t&lt;p&gt;\r\n\t\tNhững đối tượng chính thụ hưởng Dự án là các Viện Nghiên cứu và Phát triển và các doanh nghiệp công nghệ sáng tạo có đầu tư vào nghiên cứu và phát triển.&lt;\/p&gt;\r\n\t&lt;p&gt;\r\n\t\tCác doanh nghiệp tách ra hoặc mới thành lập được hỗ trở bởi các Viện Nghiên cứu và Phát triển và Trường đại học cũng sẽ là những đối tượng được hưởng lợi trực tiếp. Dự án cũng sẽ hỗ trợ thành lập các phòng nghiên cứu đối tác công-tư trong khu Khu công nghệ cao Hòa Lạc.\/.&lt;\/p&gt;\r\n&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\tNguyễn Hồng Điệp (TTXVN)&lt;\/div&gt;\r\n",
  "countViewer": NumberInt(0),
  "created": ISODate("2013-08-23T03:03:02.0Z"),
  "deleted": false,
  "description": "Ngày 1\/6, Ngân hàng Thế giới (WB) tại Hà Nội cho biết: Ban Giám đốc WB đã thông qua hai khoản tín dụng từ Hiệp hội Phát triển Quốc tế",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5f43471deeb40900001f",
    "518f5555471deea409000000"
  ],
  "slug": "wb-phe-duyet-250-trieu-usd-tin-dung-cho-viet-nam-5216d0e6471dee700b000000",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/5216d0e6471dee700b000001\/avatar.jpeg",
  "title": "WB phê duyệt 250 triệu USD tín dụng cho Việt Nam",
  "updated": ISODate("2013-12-04T16:24:06.0Z"),
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
    },
    {
      "_id": ObjectId("527dda28471deee40b000011"),
      "author": "Quang Thi",
      "content": "444444444444",
      "created": ISODate("2013-11-09T06:46:00.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:46:00.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddaf9471deee40b000019"),
      "author": "Quang Thi",
      "content": "55555555555",
      "created": ISODate("2013-11-09T06:49:29.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:49:29.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddb49471deee40b00001b"),
      "author": "Quang Thi",
      "content": "666666666666",
      "created": ISODate("2013-11-09T06:50:49.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:50:49.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddba1471deee40b00001d"),
      "author": "Quang Thi",
      "content": "77777777777777",
      "created": ISODate("2013-11-09T06:52:17.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:52:17.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddc8b471deee40b00001f"),
      "author": "Quang Thi",
      "content": "88888888888888",
      "created": ISODate("2013-11-09T06:56:11.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:56:11.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddcb3471deee40b000020"),
      "author": "Quang Thi",
      "content": "999999999999",
      "created": ISODate("2013-11-09T06:56:51.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:56:52.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddcbf471deee40b000021"),
      "author": "Quang Thi",
      "content": "10000000000000000",
      "created": ISODate("2013-11-09T06:57:03.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:57:04.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddd10471deee40b000024"),
      "author": "Quang Thi",
      "content": "1100000000000",
      "created": ISODate("2013-11-09T06:58:24.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:58:24.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddd45471deee40b000026"),
      "author": "Quang Thi",
      "content": "120000000000000",
      "created": ISODate("2013-11-09T06:59:17.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:59:18.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "content": "&lt;p&gt;\r\n\t&lt;em&gt;Chúng tôi dự báo thị trường sữa của Việt Nam sẽ tăng trưởng với tốc độ CAGR 17,3% trong 3 năm tới.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Chúng tôi cũng tin tưởng VNM có thể duy trì được tốc độ tăng trưởng doanh thu trên 20%\/năm nhờ giành thêm được thị phần.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Chúng tôi kỳ vọng tăng trưởng trong tương lai của VNM sẽ dựa trên 4 nhóm sản phẩm chính.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Xuất khẩu cũng sẽ là động lực tăng trưởng vững của VNM nhưng chúng tôi cho rằng sẽ không có sự đột biến thần kỳ trong hoạt động này.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Chúng tôi cũng kỳ vọng VNM sẽ có hoạt động M&amp;amp;A quy mô nhỏ tại Việt Nam và nước ngoài.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Tỷ suất lợi nhuận gộp nhiều khả năng đã đạt cao nhất là 36,5% vào 2009 và năm nay sẽ giảm do chi phí đầu vào tăng.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Tỷ suất lợi nhuận sẽ ổn định những năm sau đó và chủ yếu chịu ảnh hưởng của biến động của chi phí đầu vào.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Tiền mặt sẽ tăng lên kể từ năm nay vì các hoạt động đầu tư của công ty hiện đã gần như hoàn tất.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Và chúng tôi kỳ vọng tỷ lệ chi trả cổ tức trên lợi nhuận sẽ tăng dần lên 50%.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Hiện room dành cho NĐTNN của cổ phiếu VNM đã hết nhưng có thể sẽ được nới vào năm 2014.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Định giá cổ phiếu VNM vẫn hợp lý và nếu so với bình quân các doanh nghiệp cùng ngành thì giá cổ phiếu VNM vẫn còn tiềm năng tăng.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;&amp;nbsp;&lt;\/em&gt;·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;em&gt;Hiện P\/E dự phóng 2013 của cổ phiếu VNM là 17,4 lần và P\/B là 6,1 lần. Chúng tôi tiếp tục duy trì đánh giá Khả quan đối với cổ phiếu VNM.&lt;\/em&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;em&gt;nguồn HSC&lt;\/em&gt;&lt;\/p&gt;\r\n",
  "countViewer": NumberInt(0),
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
  "updated": ISODate("2014-02-13T11:58:34.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("5216d1f7471dee840a000003"),
  "author": "Quang Thi",
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
      "author": "user1",
      "content": "1111111111",
      "created": ISODate("2013-08-27T06:44:02.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "status": true,
      "updated": ISODate("2013-11-09T10:03:08.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("521c4af5471dee200b000002"),
      "author": "user1",
      "content": "1111111111111",
      "created": ISODate("2013-08-27T06:45:09.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        
      ],
      "status": true,
      "updated": ISODate("2013-11-03T03:26:07.0Z"),
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
    },
    {
      "_id": ObjectId("527dd50c471deee80b000003"),
      "author": "Quang Thi",
      "content": "4444444444444",
      "created": ISODate("2013-11-09T06:24:12.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:24:12.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd523471deee40b000001"),
      "author": "Quang Thi",
      "content": "5555555555555",
      "created": ISODate("2013-11-09T06:24:35.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:24:35.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd781471deee40b000008"),
      "author": "Quang Thi",
      "content": "6666666666",
      "created": ISODate("2013-11-09T06:34:41.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:34:41.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddac9471deee40b000016"),
      "author": "Quang Thi",
      "content": "777777777777777",
      "created": ISODate("2013-11-09T06:48:40.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:48:41.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddae1471deee40b000017"),
      "author": "Quang Thi",
      "content": "88888888888888",
      "created": ISODate("2013-11-09T06:49:05.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:49:05.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddaea471deee40b000018"),
      "author": "Quang Thi",
      "content": "999999999999",
      "created": ISODate("2013-11-09T06:49:14.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:49:14.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddb39471deee40b00001a"),
      "author": "Quang Thi",
      "content": "1000000000000",
      "created": ISODate("2013-11-09T06:50:33.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:50:33.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddb9a471deee40b00001c"),
      "author": "Quang Thi",
      "content": "111111111111",
      "created": ISODate("2013-11-09T06:52:10.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:52:10.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddcc7471deee40b000022"),
      "author": "Quang Thi",
      "content": "12000000000000",
      "created": ISODate("2013-11-09T06:57:11.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:57:11.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527ddd7a471deee40b000027"),
      "author": "Quang Thi",
      "content": "1300000000000",
      "created": ISODate("2013-11-09T07:00:10.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T07:00:10.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dddb3471deee40b000028"),
      "author": "Quang Thi",
      "content": "1400000000000",
      "created": ISODate("2013-11-09T07:01:07.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T07:01:07.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dddee471deee40b00002a"),
      "author": "Quang Thi",
      "content": "15000000000000",
      "created": ISODate("2013-11-09T07:02:06.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T07:02:06.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527debe9471deee40b00002d"),
      "author": "Quang Thi",
      "content": "160000000000",
      "created": ISODate("2013-11-09T08:01:45.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T08:01:45.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527def69471deee40b00002f"),
      "author": "Quang Thi",
      "content": "170000000000",
      "created": ISODate("2013-11-09T08:16:41.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T08:16:41.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527df022471deee40b000031"),
      "author": "Quang Thi",
      "content": "18000000000",
      "created": ISODate("2013-11-09T08:19:46.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T08:19:46.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5291fd7f471deeec0a000003"),
      "author": "Quang Thi",
      "content": "190000000000000000",
      "created": ISODate("2013-11-24T13:22:07.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-24T13:22:07.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "content": "&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; REE sẽ tổ chức ĐHCĐTN vào ngày 29\/3\/2013, trong đó có nội dung tăng vốn điều lệ lên 2.700 tỷ đồng từ chuyển đổi trái phiếu chuyển đổi thành 25,36 triệu cổ phiếu.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Công ty công bố KQKD năm 2012 vô cùng ấn tượng nhờ tăng trưởng ổn định từ các mảng kinh doanh và lợi nhuận đáng kể từ bán cổ phiếu STB.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Năm nay REE tiếp tục sự mở rộng chiến lược vào lĩnh vực dịch vụ tiện ích.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; HSC dự báo doanh thu năm 2013 của REE tăng trưởng 12% và lợi nhuận thuần tăng trưởng 2%, theo đó EPS dự phóng là 2.745đ.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Dự báo về EPS của HSC chưa tính đến rủi ro pha loãng, có thể sẽ là 10% nếu các trái phiếu trên được chuyển đổi toàn bộ.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Tại mức giá hiện nay là 18.900 đ\/cp, cổ phiếu REE hiện đang có P\/E dự phóng là 6,9 và P\/B dự phóng là 1,0 lần.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Chúng tôi tiếp tục duy trì đánh giá Khả quan đối với cổ phiếu REE dựa trên: ban lãnh đạo tốt và triển vọng tăng trưởng khá.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tQuý khách hàng có thể truy cập “Báo cáo ngắn” về CTCP Cơ điện lạnh_Mã chứng khoán: REE – HSX (cập nhật ngày 15\/3\/2013) bằng cách truy cập đường dẫn sau đây &lt;a href=&quot;https:\/\/www.hsc.com.vn\/hscportal\/downloadFile?fileid=174851&quot; target=&quot;_blank&quot;&gt;https:\/\/www.hsc.com.vn\/&lt;wbr \/&gt;hscportal\/downloadFile?fileid=&lt;wbr \/&gt;174851&lt;\/a&gt;&lt;\/p&gt;\r\n",
  "countViewer": NumberInt(4),
  "created": ISODate("2013-08-23T03:07:35.0Z"),
  "deleted": false,
  "description": "REE sẽ tổ chức ĐHCĐTN vào ngày 29\/3\/2013, trong đó có nội dung tăng vốn điều lệ lên 2.700 tỷ đồng từ chuyển đổi trái phiếu chuyển đổi thành [...]",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5555471deea409000000"
  ],
  "slug": "bao-cao-ngan-ve-cong-ty-cong-ty-co-phan-co-dien-lanh-ree-5216d1f7471dee840a000002",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/5216d1f7471dee840a000003\/avatar.jpg",
  "title": "“Báo cáo ngắn” về Công ty Công ty Cổ phần Cơ điện lạnh (REE)",
  "updated": ISODate("2014-02-10T18:19:21.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("5216d154471dee800a000001"),
  "author": "Quang Thi",
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
    },
    {
      "_id": ObjectId("527dd52a471deee40b000002"),
      "author": "Quang Thi",
      "content": "3333333333333",
      "created": ISODate("2013-11-09T06:24:42.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:24:42.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd814471deee40b00000a"),
      "author": "Quang Thi",
      "content": "444444444444",
      "created": ISODate("2013-11-09T06:37:08.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:37:08.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd87d471deee40b00000c"),
      "author": "Quang Thi",
      "content": "555555555555555",
      "created": ISODate("2013-11-09T06:38:53.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:38:53.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd9e3471deee40b00000d"),
      "author": "Quang Thi",
      "content": "666666666666666",
      "created": ISODate("2013-11-09T06:44:51.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:44:51.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dda11471deee40b000010"),
      "author": "Quang Thi",
      "content": "777777777777",
      "created": ISODate("2013-11-09T06:45:37.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:45:37.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dda68471deee40b000012"),
      "author": "Quang Thi",
      "content": "888888888888888",
      "created": ISODate("2013-11-09T06:47:04.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:47:05.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dda9f471deee40b000014"),
      "author": "Quang Thi",
      "content": "999999999999999999",
      "created": ISODate("2013-11-09T06:47:59.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:48:00.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527debdf471deee40b00002c"),
      "author": "Quang Thi",
      "content": "1000000000000000",
      "created": ISODate("2013-11-09T08:01:35.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T08:01:35.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527deccf471deef40b000003"),
      "author": "Quang Thi",
      "content": "1100000000000",
      "created": ISODate("2013-11-09T08:05:35.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T08:05:35.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527deda5471deef40b000005"),
      "author": "Quang Thi",
      "content": "120000000000000",
      "created": ISODate("2013-11-09T08:09:09.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T08:09:09.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527def5d471deee40b00002e"),
      "author": "Quang Thi",
      "content": "1300000000000",
      "created": ISODate("2013-11-09T08:16:29.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T08:16:29.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527df019471deee40b000030"),
      "author": "Quang Thi",
      "content": "14000000000",
      "created": ISODate("2013-11-09T08:19:37.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T08:19:37.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dfe71471deef40b00000b"),
      "author": "Quang Thi",
      "content": "150000000000",
      "created": ISODate("2013-11-09T09:20:49.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T09:20:50.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52811227471dee300b000000"),
      "author": "Quang Thi",
      "content": "Lorem ipsum dolor sit amet, errem solet eu mei, dolores expetendis intellegebat his ex, eruditi alienum no sed. Inani accumsan voluptaria cum an, eos altera diceret facilis an, mutat postea sensibus nam ei. Te erant scripta volumus eam. Qui putent eripuit nusquam te, ius cu congue inermis explicari. Te ceteros omittam gubergren ius, dicam noluisse democritum ex eos, an saperet reprehendunt eos.\n",
      "created": ISODate("2013-11-11T17:21:43.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-11T17:21:44.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "content": "&lt;p&gt;\r\n\tTheo tài liệu ĐHCĐTN của DIG (đánh giá Mua vào), thì công ty sẽ lấy ý kiến cổ đông về việc tăng vốn điều lệ lên 1,6 nghìn tỷ đồng (76,19 triệu USD) từ mức hiện tại là 1,43 nghìn tỷ đồng. DIG sẽ trình kế hoạch tăng vốn tại ĐHCĐTN diễn ra vào ngày 15\/4.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tVẫn chưa có thời gian cụ thể cho kế hoạch tăng vốn nhưng nhiều khả năng sẽ là trước cuối Q3 và có thể dưới hình thức phát hành quyền cho cổ đông hiện hữu. DIG đang cần thêm vốn để đầu tư cho các dự án của mình.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tHSC dự báo doanh thu năm 2013 đạt 968 tỷ đồng (tăng trưởng 23%) và lợi nhuận thuần đạt 62,6 tỷ đồng (tăng trưởng 169%). Dự báo này dựa trên giả định là DIG có thể ghi nhận doanh thu từ dự án Nam Vĩnh Yên và An Sơn. Chúng tôi tiếp tục duy trì đánh giá Mua vào đối với cổ phiếu DIG. Hiện DIG là một trong những cổ phiếu niêm yết tốt trong ngành BĐS chuyên về phát triển nhà ở giá thấp; tuy nhiên, sắp tới Tập đoàn Nam Long (đứng đầu về nhà ở giá thấp) sẽ chào sàn với giá tham chiếu 27.000đ theo đó các NĐT có thể sẽ chuyển bớt sự chú ý sang cổ phiếu sắp chào sàn này.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tNam Long là thương hiệu hàng đầu và có bề dày trong lĩnh vực BĐS giá thấp với 20 năm kinh nghiệm; có quỹ đất 567 ha mà phần lớn được mua cách đây hơn 13 năm và chủ yếu nằm trong và xung quanh TP HCM; có sản phẩm E-home rất thành công với căn hộ 9 tầng tập trung vào người mua sơ cấp với giá hấp dẫn là 1 tỷ đồng trở xuống; tại giá chào sàn, giá cổ phiếu của Tập đoàn Nam Long thấp hơn 38% so với NAV. Theo đó, các NĐT nên chờ và xem xét đầu tư vào cổ phiếu Tập đoàn Nam Long.&lt;\/p&gt;\r\n",
  "countViewer": NumberInt(3),
  "created": ISODate("2013-08-23T03:04:52.0Z"),
  "deleted": false,
  "description": "Theo tài liệu ĐHCĐTN của DIG (đánh giá Mua vào), thì công ty sẽ lấy ý kiến cổ đông về việc tăng vốn điều lệ lên 1,6 nghìn tỷ đồng",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5555471deea409000000",
    "518f5f43471deeb40900001f"
  ],
  "slug": "bao-cao-ngan-ve-tong-cong-ty-co-phan-dau-tu-phat-trien-xay-dung-dig-5216d154471dee800a000000",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/5216d154471dee800a000001\/avatar.jpg",
  "title": "“Báo cáo ngắn” về Tổng Công ty Cổ phần Đầu tư Phát triển Xây dựng (DIG)",
  "updated": ISODate("2014-01-23T06:28:24.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("521792d9471deeb408000003"),
  "author": "Quang Thi",
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
      "author": "user1",
      "content": "2222222222222",
      "created": ISODate("2013-08-28T14:46:14.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "status": true,
      "updated": ISODate("2013-11-16T09:32:18.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
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
      "author": "user1",
      "content": "55555555555555",
      "created": ISODate("2013-08-28T14:57:21.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "status": true,
      "updated": ISODate("2013-11-16T09:31:28.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
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
    },
    {
      "_id": ObjectId("527b6d8d471dee780b000000"),
      "author": "Quang Thi",
      "content": "fdsafajdslkf jadslfjl ajdsfkljsdakljfklas jklfjsdaktjfklsadjmc[f jtskdajfkldaj,fsdklaj fldaf sdafdsa",
      "created": ISODate("2013-11-07T10:38:05.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-07T10:38:06.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527b6dc5471dee780b000001"),
      "author": "Quang Thi",
      "content": "\n\nReview quan điểm tuần trước : …trạng thái mua bán chỉ xuất hiện khi có sự bứt phá hoặc giảm điểm rõ rệt, nếu không thì thị trường vẫn chỉ giao dịch trong trạng thái tích lũy biên độ hẹp và khối lượng giao dịch  thấp. Vị thế mua chỉ bắt đầu khi VNIndex phá vỡ ngưỡng cản 495 – 497 , và khối lượng giao dịch cải thiện trên 40 triệu\/phiên, ngược lại, nếu phá ngưỡng 488-490, Vnindex sẽ tiếp tục giảm về vùng 470.\n\nQuan điểm kĩ thuật ngắn hạn:\n\nChúng tôi cho rằng xu thế tăng điểm trong ngắn hạn sẽ được duy trì khi Vnindex bức phá vùng 495-497 và test lại thành công ngưỡng 500 điểm. Tuy nhiên, thanh khoản vẫn chưa được cải thiện đang kể cũng như hai chỉ số Vnindex và Hnxindex dịch chuyển nghịch chiều,  cho thấy thị trường đủ động lục để tăng mạnh. Theo quan sát của chúng tôi thì mức kháng cự mạnh của Vnindex là vùng đỉnh cũ 507-510 và trên Hnxindex là vùng 62.5.\n\nQuan điểm kĩ thuật trung hạn:\n\nĐồ thị tuần, Vnindex vẫn đang trong trạng thái trung tín, và đang có xu hướng giảm về vùng hỗ trợ trung hạn 466-470. Chúng tôi tiếp tục giữ quan điểm thận trong như trong các khuyến nghĩ trước, nếu ngưỡng hỗ trợ này bị phá vỡ thì xác suất hình thành mẫu hình vai đầu vai ở đỉnh sẽ khá cao. Do đó, nhà đầu tư trung hạn nên dừng trạng thái mua trong giai đoạn này và chờ đợi xu hướng rõ ràng hơn.\n\nChiến lược giao dịch ngắn hạn:\n\n    Nhà đầu tư ngắn hạn đã giải ngân khi Vnindex test lại vùng 508 như khuyến nghị trong bản tin trước có thể tiếp tục nắm giữ và hạn chế giải ngân khi Vnindex tăng lên vùng 507-510.\n    Thanh khoản hiện tại khá thấp do đó Danh mục chỉ nên tập trung vào các mã bluechip thu hút dòng tiền trên Vnindex.\n\n",
      "created": ISODate("2013-11-07T10:39:01.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-07T10:39:01.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5294305b471dee6809000000"),
      "author": "Quang Thi",
      "content": "10000000",
      "created": ISODate("2013-11-26T05:23:39.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        
      ],
      "status": true,
      "updated": ISODate("2013-11-26T05:23:53.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52943248471dee6809000001"),
      "author": "Quang Thi",
      "content": "11000000000",
      "created": ISODate("2013-11-26T05:31:52.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-26T05:31:52.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52943343471dee6409000000"),
      "author": "Quang Thi",
      "content": "1200000000000000",
      "created": ISODate("2013-11-26T05:36:03.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-26T05:36:03.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("529433aa471dee5809000000"),
      "author": "Quang Thi",
      "content": "130000000000000",
      "created": ISODate("2013-11-26T05:37:46.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-26T05:37:46.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "content": "&lt;p&gt;\r\n\t&lt;strong&gt;Review quan điểm tuần trước :&lt;\/strong&gt; …trạng thái mua bán chỉ xuất hiện khi có sự bứt phá hoặc giảm điểm rõ rệt, nếu không thì&amp;nbsp;thị trường vẫn chỉ giao dịch trong trạng thái tích lũy biên độ hẹp và khối lượng giao dịch&amp;nbsp; thấp.&amp;nbsp;Vị thế mua chỉ bắt đầu khi VNIndex phá vỡ ngưỡng cản 495 – 497 , và khối lượng giao dịch cải thiện trên 40 triệu\/phiên, ngược lại, nếu phá ngưỡng 488-490, Vnindex sẽ tiếp tục giảm về vùng 470.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tChúng tôi cho rằng xu thế tăng điểm trong ngắn hạn sẽ được duy trì khi Vnindex bức phá vùng 495-497 và test lại thành công ngưỡng 500 điểm. Tuy nhiên, thanh khoản vẫn chưa được cải thiện đang kể cũng như hai chỉ số Vnindex và Hnxindex dịch chuyển nghịch chiều, &amp;nbsp;cho thấy thị trường đủ động lục để tăng mạnh. Theo quan sát của chúng tôi thì mức kháng cự mạnh của Vnindex là vùng đỉnh cũ 507-510 và trên Hnxindex là vùng 62.5.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật trung hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tĐồ thị tuần, Vnindex vẫn đang trong trạng thái trung tín, và đang có xu hướng giảm về vùng hỗ trợ trung hạn 466-470. Chúng tôi tiếp tục giữ quan điểm thận trong như trong các khuyến nghĩ trước, nếu ngưỡng hỗ trợ này bị phá vỡ thì xác suất hình thành mẫu hình vai đầu vai ở đỉnh sẽ khá cao. Do đó, nhà đầu tư trung hạn nên dừng trạng thái mua trong giai đoạn này và chờ đợi xu hướng rõ ràng hơn.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Chiến lược giao dịch ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;ul&gt;\r\n\t&lt;li&gt;\r\n\t\tNhà đầu tư ngắn hạn đã giải ngân khi Vnindex test lại vùng 508 như khuyến nghị trong bản tin trước có thể tiếp tục nắm giữ và hạn chế giải ngân khi Vnindex tăng lên vùng 507-510.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tThanh khoản hiện tại khá thấp do đó Danh mục chỉ nên tập trung vào các mã bluechip thu hút dòng tiền trên Vnindex.&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n",
  "countViewer": NumberInt(1),
  "created": ISODate("2013-08-23T16:50:33.0Z"),
  "deleted": false,
  "description": "Review quan điểm tuần trước : …trạng thái mua bán chỉ xuất hiện khi có sự bứt phá hoặc giảm điểm rõ rệt, nếu không thì thị trường vẫn chỉ giao [...]",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5555471deea409000000",
    "518f5f43471deeb40900001f"
  ],
  "slug": "lang-kinh-yestoc-tuan-12-1608-da-tang-ngan-han-co-the-tiep-tuc-521792d9471deeb408000002",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/521792d9471deeb408000003\/avatar.jpg",
  "title": "Lăng kính Yestoc tuần 12-16\/08: ” Đà tăng ngắn hạn có thể tiếp tục”",
  "updated": ISODate("2013-12-15T05:32:05.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("5216d23b471dee600b000001"),
  "author": "Quang Thi",
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
    },
    {
      "_id": ObjectId("527dd809471deee40b000009"),
      "author": "Quang Thi",
      "content": "14000000000000000000",
      "created": ISODate("2013-11-09T06:36:57.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:36:57.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd876471deee40b00000b"),
      "author": "Quang Thi",
      "content": "150000000000",
      "created": ISODate("2013-11-09T06:38:46.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:38:46.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "content": "&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; PVFC đã trình bản đề xuất kiến nghị hỗ trợ từ phía PVN và NHNN trước, trong và sau quá trình hợp nhất với Western Bank.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; PVF đề xuất xin hỗ trợ dưới hình thức cấp vốn vay trung và dài hạn.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Thông qua bản đề xuất với kỳ vọng nhận được cam kết hỗ trợ tài chính chắc chắn trước khi quá trình hợp nhất diễn ra sẽ làm tăng cơ hội thành công cuối cùng.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Ít có khả năng toàn bộ nội dung kiến nghị và đề xuất sẽ được chấp nhận. Tuy nhiên, bản đề xuất sẽ khiến các cơ quan chức năng phải ngồi lại và suy ngẫm về những gì nên làm và theo đó có thể sẽ có thêm những hướng dẫn và thủ tục giúp hỗ trợ cho quá trình tái cơ cấu trong ngành ngân hàng.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t·&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Theo đó, cho dù kết quả cuối cùng có thế nào đi chăng nữa thì PVF và Western Bank sẽ đóng góp đáng kể vào quá trình tái cơ cấu trong ngành ngân hàng.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tQuý khách hàng có thể truy cập “Báo cáo ngắn” về Tổng Công ty Tài chính cổ phần Dầu khí Việt Nam_Mã chứng khoán: PVF – HSX (cập nhật ngày 13\/3\/2013) bằng cách truy cập đường dẫn sau đây &lt;a href=&quot;https:\/\/www.hsc.com.vn\/hscportal\/downloadFile?fileid=174688&quot; target=&quot;_blank&quot;&gt;https:\/\/www.hsc.com.vn\/&lt;wbr \/&gt;hscportal\/downloadFile?fileid=&lt;wbr \/&gt;174688&lt;\/a&gt;&lt;\/p&gt;\r\n",
  "countViewer": NumberInt(0),
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
  "updated": ISODate("2013-12-20T05:49:48.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("52179237471deeb408000001"),
  "author": "Quang Thi",
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
      "_id": ObjectId("527f51d4471dee440b000000"),
      "author": "Quang Thi",
      "content": "        11111111111111 Edited",
      "created": ISODate("2013-11-10T09:28:52.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-12-09T11:14:26.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5286522b471deea00b000002"),
      "author": "Quang Thi",
      "content": "        2222222222222222 &lt;u&gt;Edited&lt;\/u&gt;&lt;br&gt;",
      "created": ISODate("2013-11-15T16:56:11.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        
      ],
      "status": true,
      "updated": ISODate("2013-12-13T08:56:14.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52943326471dee8409000001"),
      "author": "Quang Thi",
      "content": "777777777777",
      "created": ISODate("2013-11-26T05:35:34.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-26T05:35:34.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52a70b1f471deed409000000"),
      "author": "Quang Thi",
      "content": "888888888",
      "created": ISODate("2013-12-10T12:37:51.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-12-10T12:37:51.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52a70c90471deed409000003"),
      "author": "Quang Thi",
      "content": "444444444444",
      "created": ISODate("2013-12-10T12:44:00.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-12-10T12:44:00.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "content": "&lt;p&gt;\r\n\t&lt;strong&gt;Review quan điểm tuần trước:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tChúng tôi cho rằng xu thế tăng điểm trong ngắn hạn sẽ được duy trì khi Vnindex bức phá vùng 495-497 và test lại thành công ngưỡng 500 điểm. Theo quan sát của chúng tôi thì mức kháng cự mạnh của Vnindex là vùng đỉnh cũ 507-510 và trên Hnxindex là vùng 62.5.&amp;nbsp;Nhà đầu tư ngắn hạn đã giải ngân khi Vnindex test lại vùng 497 như khuyến nghị trong bản tin trước có thể tiếp tục nắm giữ và hạn chế giải ngân khi Vnindex tăng lên vùng 507-510.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tĐóng cửa phiên giao dịch cuối tuần, khối lượng tăng mạnh và các các chỉ báo đảo chiều đang hỗ trợ tích cực cho VNIndex. Tuy nhiên, vùng 507-510 là ngưỡng cản khá mạnh của Vnindex (đây là điểm nối các đỉnh của mẫu hình vai đầu vai trung dài hạn) do đó hoạt động chốt lời mạnh có thể sẽ tiếp tục diễn ra vào đầu tuần sau. Chúng tôi cho rằng nếu thanh khoản tiếp tục duy trì trên 50tr\/ phiên thì có thể Vnindex sẽ chỉ điều chỉnh nhẹ ( nếu có) về vùng 502-503. Ngược lại, nếu phá vỡ ngưỡng cản 507-510, Vnindex sẽ hướng về vùng kháng cự kế tiếp là 525-530.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tPhân tích đồ thị Hnxindex có thể thấy mẫu hình cái nêm hướng xuống đang được hình thành, nếu vùng cản 63-63.5 được phá vỡ, khả năng Hnxindex sẽ hình thành 1 xu hướng tăng mạnh với taget ở vùng 66-67.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/08\/vnindex1.png&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-3346&quot; height=&quot;452&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/08\/vnindex1-1024x452.png&quot; style=&quot;border: 1px solid black;&quot; title=&quot;vnindex&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật trung hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tỞ chart tuần Vnindex, chỉ số này vẫn chưa xuất hiện điểm mua trung hạn do vùng kháng cự 510-525 tập trung khá nhiều lực bán mạnh, chúng tôi đánh giá xu hướng trung hạn hiện tại ở mức trung tính và cần thời gian để xác nhận.&amp;nbsp;Do đó, nhà đầu tư trung hạn nên dừng trạng thái mua trong giai đoạn này và chờ đợi xu hướng rõ ràng hơn.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Chiến lược giao dịch ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;ul&gt;\r\n\t&lt;li&gt;\r\n\t\tNhà đầu tư lướt sóng sau khi chốt lời ở vùng 508 như khuyến nghị của chúng tôi&amp;nbsp;có thể tiếp tục giải ngân khi Vnindex tích lũy trong các phiên đầu tuần.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tĐối với nhà đầu tư chấp nhận rủi ro thấp, có thể chờ mua khi Vnindex phá vỡ vùng 507-510 .&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tDanh mục tập trung vào các mã midcap cơ bản tốt và có dòng tiền mạnh.&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n",
  "countViewer": NumberInt(5),
  "created": ISODate("2013-08-23T16:47:51.0Z"),
  "deleted": false,
  "description": "Review quan điểm tuần trước: Chúng tôi cho rằng xu thế tăng điểm trong ngắn hạn sẽ được duy trì khi Vnindex bức phá vùng 495-497 và test lại thành [...]",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5555471deea409000000",
    "518f5f43471deeb40900001f"
  ],
  "slug": "lang-kinh-yestoc-tuan-1908-2308-tang-ti-trong-co-phieu-khi-vnindex-pha-vo-vung-can-507-510-52179237471deeb408000000",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/52179237471deeb408000001\/avatar.jpg",
  "title": "Lăng kính Yestoc tuần 19\/08-23\/08: ” tăng tỉ trọng cổ phiếu khi Vnindex phá vỡ vùng cản 507-510″",
  "updated": ISODate("2014-01-23T06:27:13.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("5217929f471dee3c08000001"),
  "author": "Quang Thi",
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
        "52c26cdf471dee640a000000",
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2014-02-06T07:31:04.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dcfdf471deef00b000000"),
      "author": "Quang Thi",
      "content": "444444444",
      "created": ISODate("2013-11-09T06:02:07.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000",
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2014-02-06T07:31:02.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd139471deef00b000001"),
      "author": "Quang Thi",
      "content": "5555555555",
      "created": ISODate("2013-11-09T06:07:53.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000",
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2013-12-17T17:36:46.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd1f4471deef00b000002"),
      "author": "Quang Thi",
      "content": "6666666",
      "created": ISODate("2013-11-09T06:11:00.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2014-01-15T07:13:41.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd204471deeec0b000000"),
      "author": "Quang Thi",
      "content": "777777777",
      "created": ISODate("2013-11-09T06:11:16.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-09T06:11:16.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd25b471deeec0b000001"),
      "author": "Quang Thi",
      "content": "888888888",
      "created": ISODate("2013-11-09T06:12:43.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2013-12-23T06:01:40.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527dd2cc471deef40b000000"),
      "author": "Quang Thi",
      "content": "99999999",
      "created": ISODate("2013-11-09T06:14:36.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2014-01-06T16:11:08.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("528653d1471deec40b000000"),
      "author": "Quang Thi",
      "content": "100000000000",
      "created": ISODate("2013-11-15T17:03:13.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-15T17:03:13.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("528653e0471deec40b000001"),
      "author": "Quang Thi",
      "content": "1100000000",
      "created": ISODate("2013-11-15T17:03:28.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-15T17:03:28.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5286e783471dee3409000000"),
      "author": "Quang Thi",
      "content": "120000000000000",
      "created": ISODate("2013-11-16T03:33:23.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-16T03:33:23.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5286eb67471dee6409000000"),
      "author": "Quang Thi",
      "content": "1300000000000000",
      "created": ISODate("2013-11-16T03:49:58.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-16T03:49:59.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5286ebc5471deeb409000000"),
      "author": "Quang Thi",
      "content": "140000000000",
      "created": ISODate("2013-11-16T03:51:33.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-16T03:51:33.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5286ebe4471dee6409000001"),
      "author": "Quang Thi",
      "content": "15000000000000",
      "created": ISODate("2013-11-16T03:52:04.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-16T03:52:04.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5286ebff471deeb409000001"),
      "author": "Quang Thi",
      "content": "16000000000000000",
      "created": ISODate("2013-11-16T03:52:31.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-16T03:52:32.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5286ec13471deec409000000"),
      "author": "Quang Thi",
      "content": "17000000000000000",
      "created": ISODate("2013-11-16T03:52:51.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-16T03:52:51.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5286ec2c471deed409000000"),
      "author": "Quang Thi",
      "content": "18000000000000",
      "created": ISODate("2013-11-16T03:53:16.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-16T03:53:16.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5286ec46471dee6409000002"),
      "author": "Quang Thi",
      "content": "1900000000000",
      "created": ISODate("2013-11-16T03:53:41.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-11-16T03:53:42.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5286ec70471dee6409000004"),
      "author": "Quang Thi",
      "content": "2100000000000000000",
      "created": ISODate("2013-11-16T03:54:24.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "status": true,
      "updated": ISODate("2013-12-08T05:49:41.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52a7ebf4471dee080a000000"),
      "author": "Quang Thi",
      "content": "Nguyễn Biểu: flkdsajlfksda",
      "created": ISODate("2013-12-11T04:37:08.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-12-11T04:37:08.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52a7f1d3471dee080a000001"),
      "author": "Quang Thi",
      "content": "Quang Thi",
      "created": ISODate("2013-12-11T05:02:11.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-12-11T05:02:11.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52b564b4471deecc0c000009"),
      "author": "user2",
      "content": "Quang Thi: hello u ;)",
      "created": ISODate("2013-12-21T09:51:48.0Z"),
      "deleted": false,
      "email": "user2@test.com",
      "status": true,
      "updated": ISODate("2013-12-21T09:51:48.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52b56674471deec80c000004"),
      "author": "Quang Thi",
      "content": "&lt;a href=&quot;http:\/\/localhost\/yesocl\/wall-page\/user2\/&quot; class=&quot;wall-link&quot; data-ref=&quot;user2&quot; data-content-syntax=&quot;@[user2](contact:user2)&quot;&gt;user2&lt;\/a&gt;: hello",
      "created": ISODate("2013-12-21T09:59:16.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-12-21T09:59:16.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52b7d1cc471dee1c0b000001"),
      "author": "user2",
      "content": "&lt;a href=&quot;http:\/\/localhost\/yesocl\/wall-page\/user1\/&quot; class=&quot;wall-link&quot; data-ref=&quot;user1&quot; data-content-syntax=&quot;@[Quang Thi](contact:user1)&quot;&gt;Quang Thi&lt;\/a&gt;: hello",
      "created": ISODate("2013-12-23T06:01:48.0Z"),
      "deleted": false,
      "email": "user2@test.com",
      "status": true,
      "updated": ISODate("2013-12-23T06:01:49.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52cad5a1471deed809000001"),
      "author": "user2",
      "content": "f ds fsadf sad",
      "created": ISODate("2014-01-06T16:11:13.0Z"),
      "deleted": false,
      "email": "user2@test.com",
      "status": true,
      "updated": ISODate("2014-01-06T16:11:14.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52d96dca471dee4018000000"),
      "author": "Quang Thi",
      "content": "fdsafsad",
      "created": ISODate("2014-01-17T17:52:10.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2014-01-17T17:52:10.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52d96e4f471dee4018000001"),
      "author": "Quang Thi",
      "content": "fdsa fdsa\n",
      "created": ISODate("2014-01-17T17:54:23.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2014-01-17T17:54:23.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52f78584471dee600c000000"),
      "author": "Quang Thi",
      "content": "832094820948012",
      "created": ISODate("2014-02-09T13:41:24.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2014-02-09T13:41:25.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "content": "&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tThị trường tiếp tục phiên tăng điểm thứ 2 liên tiếp, cả hai chỉ số đều hình thành các cây nến trắng lớn, đặc biệt là thanh khoản trên sàn Hose đã tăng đột biến. Thị trường cho thấy sự phân hóa tập trung ở các cổ phiếu penny mang tính đầu cơ khiến những mã này có khối lượng dư trần khá lớn, điển hình là ITA, KBC, DIG, PVT, OGC, DQC…, trong khi các mã bluechip có phần yếu hơn và chỉ xanh nhẹ. Nhìn chung, thị trường có diễn biến khá tốt trong phiên hôm nay, tuy nhiên chúng tôi vẫn giữ quan điểm trong bài phân tích trước, &amp;nbsp;khả năng Vnindex sẽ gặp khó khăn khi tiệm cận vùng cản mạnh 507-510, cũng như vùng 63-63.5 trên Hnxindex.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/08\/vnindex.png&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-3306&quot; height=&quot;452&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/08\/vnindex-1024x452.png&quot; style=&quot;border: 1px solid black;&quot; title=&quot;vnindex&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Chiến lược giao dịch ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;ul&gt;\r\n\t&lt;li&gt;\r\n\t\tNhà đầu tư có thể chốt lời một phần danh mục như chúng tôi khuyến nghị trong các phiên tăng&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tHạn chế mua đuổi cổ phiếu khi Vnindex tiệm cận ngưỡng kháng cự mạnh&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tChúng tôi sẽ cập nhật điểm mua mới khi Vnindex bức phá được ngưỡng kháng cự 507-510&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n",
  "countViewer": NumberInt(14),
  "created": ISODate("2013-08-23T16:49:35.0Z"),
  "deleted": false,
  "description": "Quan điểm kĩ thuật ngắn hạn: Thị trường tiếp tục phiên tăng điểm thứ 2 liên tiếp, cả hai chỉ số đều hình thành các cây nến trắng lớn, đặc [...]",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5f43471deeb40900001f",
    "518f5555471deea409000000"
  ],
  "slug": "lang-kinh-yestoc-phien-1608-can-trong-vung-khang-cu-manh-5217929f471dee3c08000000",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/5217929f471dee3c08000001\/avatar.png",
  "title": "Lăng kính Yestoc phiên 16\/08: “cẩn trọng vùng kháng cự mạnh”",
  "updated": ISODate("2014-02-09T13:41:25.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});
db.getCollection("branch_post").insert({
  "_id": ObjectId("52179310471deec003000001"),
  "author": "Quang Thi",
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
      "_id": ObjectId("527df12c471deee40b000036"),
      "author": "Quang Thi",
      "content": "        2222222222222 &lt;b&gt;&lt;u&gt;Edited&lt;\/u&gt;&lt;\/b&gt;&lt;br&gt;",
      "created": ISODate("2013-11-09T08:24:12.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000",
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2014-01-06T16:22:04.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("527df133471deee40b000037"),
      "author": "Quang Thi",
      "content": "        333333333333 Edited",
      "created": ISODate("2013-11-09T08:24:19.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000",
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2014-01-06T16:22:02.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("528e4bf3471dee980a000001"),
      "author": "Quang Thi",
      "content": "        7777777777777 &lt;u&gt;&lt;b&gt;Edited&lt;\/b&gt;&lt;\/u&gt;",
      "created": ISODate("2013-11-21T18:07:47.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000",
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2014-01-06T16:22:00.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("529e1518471deef80a000000"),
      "author": "Quang Thi",
      "content": "        4444444444 &lt;b&gt;&lt;u&gt;Edited&lt;\/u&gt;&lt;\/b&gt;",
      "created": ISODate("2013-12-03T17:30:00.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000",
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2013-12-17T10:22:03.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("529e15d7471dee080b000000"),
      "author": "Quang Thi",
      "content": "        555555555555555 &lt;b&gt;&lt;u&gt;Edited&lt;\/u&gt;&lt;\/b&gt;",
      "created": ISODate("2013-12-03T17:33:11.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2014-02-03T08:18:00.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52a420b1471dee740a000000"),
      "author": "Quang Thi",
      "content": "66666666666",
      "created": ISODate("2013-12-08T07:33:04.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2014-02-03T08:18:01.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52a42253471deee00a000000"),
      "author": "Quang Thi",
      "content": "777777777777777777777777&lt;br&gt;&lt;img style=&quot;width: 249.35px; height: 161.851px;&quot; src=&quot;data:image\/jpeg;base64,\/9j\/4AAQSkZJRgABAQEAAAAAAAD\/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT\/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBT\/wAARCAFlAiYDASIAAhEBAxEB\/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL\/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6\/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL\/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6\/9oADAMBAAIRAxEAPwD8r1X2xVqC0aQjjitfwz4an12fbGpKiu0l8FmwtclDuFeXXxtOjLkvqcc6uvKjzmSAR8EYNIISwzgtWre6fJ9qYYOAa0NP0pJI8Nxx1q3XSjzGMqvKjlntz15qxY2LTSAAZJ7Vv3VhFHkAirXh61VbxNyjrxUTxPuOSIddtWI08OvFD5hXAx6dK0dAt1jugHHy11eplJbRIIlG5hyaq22i\/Z41lYYrHB15VI80zFSZqJAZ7Jwqt04rmdU1EWLiIYyDk+1dTeapFYaSQGwxFeWalfG8umfOFzxXqX0ubUTqtO1t5mLdT6+lWXee5k3FyF61yGn3EsBBHOa6Ky1B5VCFCDXDOcb6nNKC6kWta5JYQmJGyQMKK49WkmmMj5dick12Oo6J57tIzbif0rOXSgsoHQilLExSsZRlCgrGn4bErBVFegaDZyfaBu6Guc8MWKwMCcEHrXoGlQiW6ijGFDEZavna01UlKxn7a5638M9MkuwuF2rjmvU7DRxbDoSpPpXN\/DbTFtEjOcDGPrXdX2owWIGOWrxYqnTkzNxb96RzHj7wnB4k8OXmmuiB5ULW7yDPlS4OGHoeSM+9fNvgDxTq\/gbxHa32nS3CLKVt1ULsikYMCRIT0+cAH23V9M6jqwu5CS20V4d8VvD66a+ouk9xDBdGO9t7eDhDKSRKzHsehGP9rNe1lGJ\/eSw09mejhJe9yxPpPwbrcFl8UL3UNM1X7FfmJP7b0eBQ1skpGcFcfK3XkEHG2vQviF4Km8b6dJpU+mJqdiz+Y19Y3rWUqwkHKPswJPcE4x1Ga8e+ANto2ja1pVlHHChlhkmvZZVILfOokBIxuOApBPv619OReItF8NWsenm7EkaLEXVQSMt8xwPTYRx7n1raa5JadD6mE+Zcx4j8bdQ0v4G2PhkXli0Gg3hXTX1KCMCKC4WMeV5gHRXQMAexUdjXj\/izWftkkqAYHY19TeK9c8M+OLHU\/BZvLG71c2rXNvZvgupX7p2H0\/SvmyHwn9uQhw2\/PpXnVakINaas+QzuhetFx+0cJZ2uTlRwK0PKDxsOM1v3Hhr7BAV28+tV7XTS\/AXPFbRjze9I+Sm5QlyHGX6Tq5aIZIPWtTw3cXMsn7xWDe9dXoHhNry7zLHhDxtbvXf2Xw0jYrJGgBFPEV6PLyPceEoV6vvtmDocchVQR0rUubRjzjiuntfDQtIMBeRVfUNtqhDgDFeIoc7vA91x9jH3jj2j8qfIPIrpNN14W0A9f7tcVrGtQQTOS6pj+8am8O3P9qsr+aojP3S3Ab6etRVpO2pzwrc0uSJ1mp+JZGhOwckVwGqazdCUt82favUbfwmJ7c5IdyM7hnisW98HiGYrIFDZ53dh6\/SsaFlsdkqVQ4KxmnmIeXOa6\/S9U+yxgZHNQ3litl+7QByeR6\/\/AFq53UrmW0bdwDnGzOT+Vbzpua90iNJ05e8d4NcMihQeP9mq2ra79jgLlS+3muc0HUVkAZ85NXtauFljxngjmvI9hUlPlkVJ8vvRM3T\/ABQjXZuFZoyTnye1aNt4zb7SGd1QE5O3vXC3ssVvcnYw57Vga3Pe38BSx3eYejIOle1TpU2uRs5YyqylY+tvB3jOymhQvcRocfxHrXQ32vfbYnW3z5ePv18q\/Dm11PTLVGvCzStyd\/WvWbbxc0Foke7Yeh5r5rNMasMpQ3R79GpKPLzMuXty9vfSd8nmluLzfARuP4VXjvLebcd4dz1NPKiYYwCBXyuCjVxL9oleJ7FavG3Kcnq9+bVyznFYr+Lm3BAQT35rrvEOhR3lqXZtuRwq147qUM2n3+8kBScBl719Bia0p0fYNWPM5FF80ZHpWi+MX0+QPJlx6etdjpvxFjkH39wbs3avKbO8WSJGC9Bj1FPhuitySSqAD+HivEq5POFL21Of3HXhsXOM\/ZyPTNW1cXr7gRsHNZEN\/bfaACcNnp61z412FIjukA\/Gs6TxFAZPkfLHmvJouvf3lzI9PEypxdz0X+1rWOP99wv1rk9c1rT52kUOuccbTWDqt7Pd6eWgfeD1zXG+H\/DWp+IteKxuwjU8jFfQ0sLRxE1KcPePAxE5W90xfGtrOJ2ni+YZ521lWt+I7Mhxvcjqe1em694NntUKThgg61xF5okTs6W6jj+Fe9fQuj7OKg0cVKbl7pxOqQrfOQp5J6UsVvFaw+U2Cp681qQeGpY78mdsHqFz0qn400FbW0NwkhUqOg713UcRCM1SvdM9SdOah7SJyOu6dmUhGGw+lcRruiRmE7gM9a6XT9ZMrPu3FelZuvSJMhCcGvosM6lKaiy4yjUOBtke2uwnUZrobpDPbplelV7HTibgMRnJ71uXWyK3YbRkCvZrVU5qxy1abvzIxUuPIhKMd2Per2i3lpPMIpgKyLlgyOT3rMswftq\/MQg71qqSnFvqczjzxPffBml2814BbEYz617HokH2FgM596+dvA9+mlyibzGLD5eTXtOieJobpE3SLux61+cZ7RlOd4LQ6sPCUkuY9r0a7MunrEGAQdV9aW5gBBxXP+HTNdWoli\/eAc\/L2rdS681SDkOOobrX5ZVpuE3Y1leOhlXkAwc4rm9SgyDXVXfIPNc\/qC816GHk7mMtjj76A+ZwOKK0bqIeZ7UV78amhnc+cPhfbRW1ix2qzOPSuz1iyia15A6VzHgbTZbO3+YYwK3tZmkaLb7V97i5OpinKLONfEzzrW9KSOR3UjmuZub8W8hCE7RXVa3uCvnNcNdwvJKT1r6rBrnj7zOpKMyZLvzGJbvWlpl6quoUDJ71z4jdTjpWrpgEZBJr0Z01aw5R5DsLK+\/fDdzWjqV+0kYROgrlrAvLOP7taOq6ilrHjIzWtCko+6TCJm+Ib+RrYjP3uBXIRhpZwBmtO+1H7Y+wfMataNppe4U4+Yd67J+5E617kSSysJNqHb1rcsLUow4xW5ZWKeQgcCr0elKuNgVgf9mvAm+c8KpiJUzDlYouAM1lXJKMBjk1340JZI2KKSawtW0YW7bylcjnCLsQrzgT+DoBLJtPevRtL0h47iJhuAHPSuG8J3UNrIhkG1RmvVtP1CGe3R1dWWvJrtqehxU66i7HpfhHU5IYER2ycferoru4NwM1wOg6gBjHNd5pam8QZHFePGn+852ezF88QtdPa\/uUiCklv0rqviD8OrL\/AIV9\/aM8IkOnMJJeOTG3yN1\/3gfwpNACabfRPIgeMHkV6hrmhN48+H+s6FZSiKTULUxh1XcVQfMcD1wpr1MPViqqVzqw6\/e+6fKXw68Pa\/e2ej6b4P0SbWWmWa1OsT5aKNY5BExjP+8AcnsjV7Nb+EvEF3NZwah4hubi5uvMgkjtLAeVIV2gruUZV\/lOXzgDpXuHw28Had8M\/C9slhb+TYtaRykNP8nLbvlz90fMTzjuax\/hLJDoHh3UxLeDURFdzXc0tvmZY9zb\/KVjjIIZRjqOa92rV53p\/wAE+njFRPF\/HngzXdGkvda0Dw1YSeLtPit5Y\/EsUgightYWJWMoclpTGNpPQgCpLfWLa6tRcjy4zLuYpGchc84B9s17VeeN9IuGuobGS3Iu45AYg+TjaQPk7DJxXxf4z8c\/2Lfz2UfE8M8kToFCLwRhhjrkVwSpvEtR6o8HO6nscP7d9D027liuyURwXzWzoHh5HiDuOCK8O8JePDdXrCRsjP3fWvcvC\/iaI26BiuMVw46FWl7qPj8FWhVXOzp9P8OqDkLyK6rT7Yww4K9aNAxeW8Uo+4\/RsVtvaoAR6V4lSlOUb3Po4Uvd5omBdLHDA5IyTXlfju8lZX+zAl+wxXrNzpdzrM4trSJpWbjjoPxq7H8M9G0eBZ9bmlvZX5SwtTt8w+56kfkKjAVcRCW2iKp5ZiMxfs4L3f5j460Xwxr\/AIn1ea10uym1u9Dbmjt\/khgX1dyMfgvFe+eAvgtrWjYn1UWImOMqrM5X8Sx\/SvYIryKyI06xtoLCNSCUt0ASD0GP4pD79ByeoFTXWqW9rZtHp88bzs5je6kbdiQdVXP3iO5PA\/SvpakvrHuyVj6fCcPYbCU+T4jiPEd\/Y+E9Lae7Zo4sHkJtA964rw18SfDHiHxPLp0+sWL31wvl20E8xiEpGB8p6En+71yK8j\/af1PSJtYttKm117rxDeu0MM1xdMkEL5ABzgg8nGVUAc8nFS\/AH4R6K97qdj4jslm1nT9ssV4ZmOZPuMrAnDrx98c9M9q6aGW0acPaNs6JUKVOUVBH0ZbXWlWhKXNrDBKjbXdYRxnuDyawvE3w807Vv9IgCTiT7siqN3\/1\/wCdY2ta3Epl02QG5eMOItxyzoCPlDdyuR74qj4U8aqkx0i6mKCZiIpG6q3VWH5EH3H1qJ4a6bgdU6cK8OScTL1PwVLocZl3KAv937x\/CuaKX2tXX2O2G3u8hHCivbZ7lL+wk4SS8gwsi+vHDge9YvhbSbnVNTeIIIwxy8gGOK8CXNTnys+MxWX\/AFeryxPPX8Ai1tt8uXJ56ZJrW8L+GLaeZI9gyD93Fe0az4agtdJdYow87rgHrj3rgdH04aReoGbPODuPJrzMdN4flqF08JJvlia8fgeIQnYi5A6+lc3deBDc3Dud2F9q9MttRiEYCkE9MVPPcW8FtuGGJ\/hWvna3+2z5Uj054KEF755\/p3heCzhLuCXHao7tRbwllwMU\/wAUeJPssuyEZY9QtcNdeIrkmVHyBnI4r0KVCWGp8tKJ5t6XNyk\/iHxAbVBGAxGOMc1wl\/Ib05aMxxKC2T3NdNJfRG2IlwZGP3m7VSvTaSwDJVC7YG00sTQq1YRnaxMGoz905KO\/e3cRjIBGAaS5nZUfc2ciu4h8GQT22VGXIyfeuI8S6Tc2F08ZVsDo2KujL2ULTZnPmvzROH1zWrqNiiOwUVq+Dbye7+aUk\/7xqOLwzc6rKTIpWMH061bbTpPDsYZAdg7+ld9KdONGSgtTWMvav3j1C18ldLHyqGxk1H4S8QWeiazKCVBfkV5bc+OXjh8pXJc8delYd1rc0c6yNKxc8jBrzadPEt3ejLlS949v+Mnjy1s\/Cd1JbFDc7eM9a+YfD\/xKvknkWUgMTjdXS61qsut2flSMXArg7nQjFcbwpTnrX0+Fmp03GvuZQoqMuY9GsvEcToZJGGT1J5zUHiK\/OqWTYztYVv8Aww0LTruxIlgjmmPV5Bk1N4w8GjT9zouyJjlQD1rkVCjBOtJ2a2KqY1058i+E8z0rwrEbKTHUmuH8T6f\/AGdfeWWGT2Bziu38TaxL4etsY2KBXjGr+JXvdSeRyTzxX0WW0q1ebqXvFmdF+\/odJCUhjycD61XuJxMCNwJrEGrS3A2qCfZantLO9P754JhH\/fKHAr240nTfNI6px5ojprB3OQMg1V\/s6SKYYBFdTpnlgDfzmrtxZQPhiQMd6ylinGXLY5XTlGPMjBtY7uNNqEk113hF79dQQuXb60\/Q4bbzQQAQPbrXqfhXRrC5MR4DsfWvAzHGKknBxuaqfs4c51PhDxle6BJFIgyuPnVuhr0OfxNa+JIFuYPLinUcxjg\/\/XrlV8EyywR\/Z4QUIrL17wvqfhuIXaxuIRyXXtXxGJyqdSPteW1\/61OOOPhiH8Op1y6uk2VJw46iq18VkXIxXGaTraXt0C8oJbv611r6bMYw0bhge2a8GpQVCST0OmUrGZKvz5oqeSyuN3MZorZSXcjmZ4ZaulmdhI7grUd5dxOhHANczeao1xduynaM8Vn3msmIEZr9OjhJSafU55QtLmIPEMyFiBiueMKuM7fmNN1TUy7E5qvZXhd\/nPy+lfU0aUqdM0jEivrTylZhx7VDYsXfbnrV3UCbj5U5zWnofhlzGHIPrW7rRhC82XPcZayiCEAfexVHV7gyxknNb11oxV9g4FYWq2hMyQj8a9DD1FKOhVKfIUdE0t7iUuB8o\/iratUltZsKK7Xw54YW20fzXXqKopp0P21s8DNa1p+6VORPpIe4ADEg12+i2AnCIcHFYFu1vaoMEb61dG11ba4BYjGa+eqNu7RySp+0PRLHw3GbTJXIIrk\/FugLAh2x5JrsNO8ZWz2wUYU4qhfyLqrEgbs9K+an7RVOZnPKlKOiPIn06WGRdgyv92uo0me4t0Clzgc5Wuki8KBk81u9Z8+ktFNlPlFdCqXPMhyqVzo\/DerMZUBPSvX\/AA1qyrChJ6CvG9B0196kgiu3sZJYF25wO1ctZp7G6rcvwnq1rrEWzPevRfhn4pTR4dSvH8ySVLZ47aCEZlkkYYyoPXau5j7CvBdKvZC6o2c+te9\/DnwKuueG4dXkvm06e3vAY7gJuEcQMfmk8jqu5Bzn95xXNgv3mKUe2p6mXwdTERl\/KdL8T\/EN3NcWFlp9skVnbqJL8q4DSSGL\/VowPVVwPTJNZ\/hbQm8PxCG3kuIpLuUXV2ZWB\/0hkUFcLwuAw9eFFd54ttIdJ0DW9TsbYQahqEWYlZAZLeMDylKg9wMk5ryzxVqsFrYXAtALe5toltYGt4stJKQCxJPBOAOelfR1X0PsEee+N3eSe71C0hFteRytHBLGCdib8sMdgcDr2BxXzL4k8OXd\/eNdCMgysZAuScZ5r6A8S+I\/P0JEt2CXMnyt5X3QMAd+vU96bbaRbXxAkVX2jADVyfX\/AKm031PlM\/p+3hCij580bw7c2WoJKFYIf0r23wJZzyqm9WGfUVs3Hhqzhhysa5J9K1tAWK0YD5QU6V5uKzZVU1Y+Yw+ChRlzM9a8M3gtdOiiwPlFdJaQG8kHUBjj3Nef6ZqSKyqG59fQVN42+JVr4G8Mz3s0hQ7SODkj2Hvnj868bD4meJqezP0LK8LLGz5fsxOp8bfEHTvBEUdnEUkupspHHG2TOwHP0Qdz3+nXxrxT8fIdKkMSXQl1qdPNe46m3hzjzMdv7qDqTzXzT8SPjtcWc1xq96yzandrttrVecKDxCD2UcGQjqcAd8eF6x8Sb0JMGuGu9Uv5Wmu588u3oPRQMADt81fdYTK5SSlM+urYqhhF7KB9oz\/tET6lef2Zp05tg0eZriNsvbQdDtJ\/5aueAfU5\/grivEvx81vW2bTPDm2GGNfs1vHEPliUcDB785JPf9a+YbDxbPpNg8ULk3l0N8s27k9gB6ADP519Hfs9eBHu44JXiLscHLCuuvhqWFXO0TSxEsRoYlh8DdX1WWHWdXEt\/dqQrXEhJcpuyF+g\/lXo9546n0K4tLqFR9thf51IzuwMMP8AgQB\/GvqXQPB6HSfJaAbCuDxXzZ+0V8N7nQpH1GyibZGdzIo9Oc\/pXNSxjrTUKmxnUwyak4blTxT46Ja11iwbzYD+9KofukcHP05B9qyte8UR3YS8tHEYuALm3kx\/q3Ugkfngkf73rXjmgeMWsLz+z5z\/AKNcF9hZuA5yf1\/+JqW08SGyuLnTJJfKgd\/Pt2foh5DD88ivVjh7e6cjqaXPqHwv8QoryysNQyEkJ8qZWbIMZP3W91YHBr1\/wfr0DJuiAG\/ku3WvgrR\/FlzZRT225khaQT+W3VCHxIv6Z\/CvfPg346Oo3o0+WXE64UNn73p\/X9K8TM8G40nVprVHPXSrwt1ifSfiPxAbfTpUiAM7jAPoK8nDXZvGmlLFTwBXqGm6KL2ENIQ+efmqhrugIOEATB+8or8pzGrKvUjKUvd\/lPmKsJ\/xIs5i31ExMU+bLDhl706T7aFdWlbB+6q81sW2mxI6ZXJzjKiugh0i2AV3wOeDXDLGzpPloQ1OvCU5Yl2qSOM0jwi07+bcs0pbn5x0qHxB4WghR8R84r0X7RBZcBfpVG9tV1NXcqAmPvV9Jg8XKtT5Z7l18BCk+WB86a5pE3myiIMMCuIGlayb3zXViAcDPQV9RTeELSGIuQHDdd1YN\/4ZtAoZQACcbfSu+vSnVhynleylGRieCZJDZILnaZsY21r6v4bttVR3kjG7P3qp3mn\/ANh25nUMAOQF5ri9T+I91aTBHG2M+pxXh42nGMeRM3hGUfdkdYPBNvBG20ggf3RXC+OfDgW0kjhQlyOrdq6fw\/8AEKC5VEdw7t1I7Vd8SaraXFtwFJIr5\/2mIoxTT0XQ9KFGjL3ony1q+hzWMpODnPOazrSJ728USZwvavWvE9pbyl2AGScYrio9MEc0jAYY19bhsW61PbUyqVIwfKx9lpQdD06fdxXOeJIVtAxbjHet972W0xGAQWOKb4l8NS3mkmbJJ25q6U3Tqp1How9ya9089s\/Gd9pExNldtbEHqvNa0fjzVLubzb29lu2b+KQ1y\/h7wFqvifWXggRkgRsNJ6\/SvXIfgeLHTsyhjIBn5uTX1NWhQaUdHc8ivVpU5csjgfEUsPie18rIRsfnXA2vwuudR1IRRg4ZuW7CvTF8EXsGvi2toCUJyzvwqCu\/svDsmmRCXKOU+bzFBrD61Uy6NqT91ipVEbHwa\/Z00rR7SO6uLKK5lcAtJINzD8+lel\/EH4QaVqHh1ysccARcgnCijwh4rSPSI4on8p2TnjOPpXmHxB0HVfEGoyAXdzcKTkiWUlQPpXz1DP6mJrOnVhaXc6IvldmfM3jW0h0TXbm1tJVuVjYgmJtwH4iqOlah9tYIxIOcda9mj+Fcccc4eLEjdNwryXxF4Xm8L638uMFs7a+0w+Ow+KbpR0kghWj8J3mheF5JbUSJkqR95fWrhnv9BkSSA\/Mh6Gn+CvEvmWogGY\/51u6lYs6FyAVPO6vm6tSoqzjVWhlXrqn7p23gf44CysxFqcTLIowXTkGugu\/2jPDVxA9rPIrqwwVZOlfO9y88DMIgXf0AqlaaBqN\/vuJLaRY14yVxXfSja7ctDz06c+WUPdPR9a1DSHunvNNkEcbnIVTgCm2vxBvbWIRxSjb\/AHsZNeaamZ7KyK7SCOvFcjpnia4ttRkR2LITWMMqjiINv3rdz1H9k96\/4S+8k+c3cmT70V5pD4jjMQorm\/sxfym9onI3cslrArujxhum8EZrnru7eRzg8VQvtav5Wj2Xk89vGxYW0rsyAnrgHpVzTbM6patc2+ZFiAMybeYie\/uPev0WOHVNcxjKlyx50Zsu525JNWrO3yeK17Pwxc6lMEtoGlY+i1uDwfd6MqG6gZA3qKKuIjGNkY+0j8BS0jTfMcM4wK77SLNEgwFzxWDb2yZHAAHeum0jaE9hXy2MquauDlqc9rx+zyOxG3Fclprf2hq6k8hTXceL491uzYrkfCdj\/phJ65r6PLKv7nmkaSidxrGtrYaUkCD5QvNcXY6y9zcuDjOa3\/EcIFs2QeBXE6Rn+0mGe9enNpxuNx907MrPMm5VLVFI88HJBBrr9D01TZhiOcVHf6YjSfMOK+ao41VKsoHPKpymbod\/LvG7LZr0TQ7lGjBlfnFeelo7GX7mMVYi8Qg9HwooxFL20eZHl1sU5e5E9NvNYiggKIw3dBWVZ6kvmb5cMSa42DUzdy5VzW5Y28l3ImPmYV5McNJLmkZyh7p6doUcMkaFRuz7V1dvpgeNX2\/8BWuS8IJKyIsiEba9JsEDgIPSvGxMpQdkb4enT6D\/AAn4cufEGsRWen27T3LK0gUDoFGST+Ar6ot9B1fSvD+hw6KiWljY30M72jOC17GVJkZ9wwG3HITsAO\/Tj\/gV8MXktJddvHktrGcGN\/4RJAOSPXDMAvHUZ9a9W8T6vCLTVxbNGLhYxZ25VgEhkK\/0HpXuZVhpUaXt6nxT\/I+rwFGNOHN\/McZrXiL+2VnniWKXSoXEk25stGVOPJZDyvG0++4V4p4g1Zr579pLcwR6ePKijjO1cZIGPfFWPEutPaauUs7tblLWNIAYzn7Q4PGcZySSBznAzivMfFfjmOz0a3juLSX5JXUQRfMZGDEbiR64b8CK9BxcnoerKehj+N\/EhmvXKRohtXw21gAT7D0z6Vn6L8RcZV1O\/wBq4iyhvrr7fPcsbiKaTEUh67e4HtnNX7HRHyHCtg14uNVJ1eR9D5TMH7SqegP44TyyxJGfejSPGEt3cbUHBNcjB4anu5ApJVBzt9a7fwr4SEUmWXbXk1VQjF9zw5c32Tt9P1mPTbR728kMUSgscHk47V8l\/Hn9ou38QavPbRSG5tombEUbMFdsYAz6dvp9a6X9q\/4lnwwsHhyzlKYg86fYeTnhB7Z\/lXxhJO0rM7nc7HOTX2HD2VRhSWIn11P0ShW+p4ONGl8UtWa+pa\/d6xqEl9dOZJ36KOAo7ADsBVOG5McjyOd7kc5\/lUEbYjHqTW14R8Oy+ItWgiVD5JYBjX3Lagjz0pTkdx8I\/A994w1qKR0YxbgSWHGK+7\/CPjHw18J9LtorhJLy8IA8i3TJzWJ8CfhlZQaVClrCvmBdxZR+X9atfFGWL4aeG9W1qCzjvb6zXMMcoyGYnAH5kV8Xia6xVZRsfVUKXsKZ9A+B\/ibr\/iSyjuYPDUdnZv8Ada7fBI+lb\/irw0vjTS3F3bWwnCnCRPkfkRX542M\/7Q+va7ED4g1PTos+YWtmRLRVaMMoUZBJB+UjHGK+0v2efCvxTn0mNvG9zY3RGNk1u53sPcbBWWJwvskmpp+Seplh6zn70U16nxb8f\/gje+D7i7nsom+ypKZY2A+4Cen4fyxXjetaqdQ022u3H73G2Vffo\/64P4tX7A\/EX4Q2nibQbiCdFeQp\/EK\/KX43\/Dyb4a+NNQ0mVTFaTb54d3THcfgR\/wCg16uAxTqfuqm6IxFJWlVgYGh+J\/NaLzZSZQNjsx69Bu+v3c+ua7fw34yudC8RWM\/mkOhEZbPBccofxArwI6i1ncq6nODyvY9q7DRdci12zSBn8q9jw8Ex\/vDoD7ct+bV7NWKas9jzKNTmfmfp94S+IMGvaBY3ls+7zkBI9D3H510aeZqiAK4DejDj86+QP2cvigVs5tHvPkZTyrtnY3TP0zivrHQNegNqqOCJxzkHg1+GZrgIYXMLSWnTseNjIujP+7IknWe3V1I2OvX0rBTV9RvdSS2hQuR2NdFe6kJmyRwas+HktLLUBPIBkjFYzp06vuIdGfL70ZFXUdC1eK3jlwsgAy23rWeniCTTiFch4iM8dq9M1TX9PisJlVgXK4AryddBN3cyyNIfKZshaUKdLAYpRU78xlUrNz92RBrniKeUrFZRNKZDyewrK0yz1CW9Rrj5Ig3PvXWwW9rp8TBlAx3bqazNW8U2Fum1HUuP4VPSvXxlSUYcyZNP95P3jQ1GyguLMRBBgd68L+JfhZgXkUcD0r0S58bxpOkKEl39+Kh1K1\/tK3d5QpRhXySo1ZV\/azlqj1qzhKlyqJ80w6xcaVebBu64FdhZ6pc3MG99z8etM8Y+GEt7zz4VyAeeKLK7itbdA65wOa9ipGnUtGWh5M6zjG0CjfvLOzlUJA65rLso57y82AYbPcV0L3xupdse1A3ZabpqBdaithkyO3bnj1NNpUabcH73Q43UlNal2HwMZHS4YB8c4xV+70RJbYQshAxg+9ej2enxQaaCgd5AMlQtZt1ZRMglC7XYZK183UnjI+\/Vi0l1OZ1ZX5Uch4V8PW+hymRI1Bz6Vb8R\/EWwgU2kSqZF4ZyM4+lSavera27qvBYYrzi30f8AtDW8nIDNyetell1erzyqykzOfv8AxFqW+u7jU1nihxbg8sV616HpllZ6zociRRSSsV27FXgH696dP4YgbT4LeBGOBye9dX4dsV8M2UcI2MVGXUc4rnx+MxSp2ine\/wB57GFpRc4xfwnBWOhy6DNEs8b7AMLuP3frWvY3CJqJEqICxCoX6HNbOq69Y3lxsBjwnVc8k+grl9atXXUYLgZjSNgyr6fWvLoV6k6kZz92R6OMwq5bUz0PxV8MLRfDouYk33Mi5OBwK+RfHngto9WlEqElTX1tYfE23OhuLgtJIifd968a1Gwn13Up7yaMh5DuC+lfok8TTpRVSjqz5tqNOtGSR5T4R0KKO4ACgEV3F6kDQiJ1VAox97rWF4otbvQZvOtw0eO9cFqvjq5Rjvclx6V00pVMVFTpb9yMXSVR8zl7p9I\/Djwfol\/gPBGzN97cBXqk\/wAPdCg0iVFihU7favhbT\/iB4jhY\/YGnx\/fjyK3I\/iP4ujgMr6repkcrI2R+td1GOIoR5avLJGmHw9NfCvePoXT\/AIM6PrDXULxxsTnBr5b+OHwqb4feIG8pD5MjYWvQPht+0DqOg6oq6k5uVc\/fxR8d\/Ftp4xsluonVpCdw56V6WHfsWaP2ilyo8DtLiaJSNhz9KK3NPe2uIvmOGHYiiuiVVX1ieglJo8r0seZOAelb+m22qaZ4i0670VWWaQiJgq71bLbSrL0KnpiuasZjFMBjqa+6P2Mfgkdbng8Q6tbAxAqYY5V6+9fRYvELCx9o9gnUlCceU9g+Ef7NulWvhy01WexWxvbqNZJrZssIiR91T12\/yrw39rfSoPC2o2Wm28Cwzud5GO1foH4jvbDwx4XvLqVxFBaQNI7D+FQMk4r82rv476F8bPE+o6N4vHkWlzdPDoOtKAPsvPAc\/wASt\/dPquOlfKYanUxEpVFrYqWFjNWieUQZc+mK6PSl2RZYirXjP4dav4E1BINRt\/3MhPkXkR3QzgHqrdD9OorPhR1izk9KznH2j5Tz6kZUZcsjJ8aXywwkZ7VheDboSTFveofG8rSyBKj8MwNaxKe9fSUaahh+WJ0x+E7DxAEmtSB6VwdnalNVBTk5rqb68Mls\/wB7cBWNpciC6Dkd67KavDlZrH34nqGgySx2iLj5cVPcW5L79+d1TeHDFcQogxkitO9thECVXg18pUgqU3ynm1I8sjjtRTcSMfjXM3UJjY4LLXYaqgXORtrl79wik+vevQoT5lynJXhoQ6XfmK58tz16V6r4JxI8WF35rzHRNAl1e8iMKsVB5avf\/A3hGKyiiZid\/U8Vw43FU6MeWW5yK\/U6rTdNkKgqmA3tXqXwv8Dah4r1qK2s7Jr+VVMmzogAxy7fwoCRnuegyaj8A+GE8RaqlkU8q1ijMlzc9VhHYEdSzHoAPrivf18U2vwyFvpOkadHHqN1blHuzgLa28Yz5koz3ZifUlsDgV5eCw7xUlVqr3fzPcwOXc0vbVPhN74maheaFol3Hpqy3hEEUXlWse22iCkISijkD73fjH418x\/Ej4lTeG7V9GiunkSG3d5DaWjv5zlQY9vXCqcg5Ir0D4yfFbV9P8I5sNPl15Zf9HYsfKMkhBKyJEByA3Y+npXgWv8AxFXR9PinLSvcX8AkuEu5PltM43KAQNzcgHt2r6WUnN3SPq17phH4lWHhu3iuLh1064a184RXT7zNMejLJjHHzfIcdfSvMdc8ZXF1bj7I6zT3OzasfykhvucA8Nkj\/wAdriPiPr8+oXouftM8f2h3As3h8uJUznIJGOetaPwhS5m1xrq8gjeztTvjcgZMoxsHvjGc10OEadN1WcOIxEaFOU5HtmmeFv7M0qw04kyvbxBJJDyWfqxP45rp9P0KOOAEoPm9axbPVVhTzHfB9DVlPGEQYJuGT0XdX55XoVLyk95anx31nm+I6eLTobRfMO0r\/s1bS9hSPcg+YGsSxmfUm4DMK1rfTWSZQcjPrXkqnr77J5uaXunw1+1pcXMvxb1ESjEbRwsi+2wf\/XrxY5zX1t+2l4CP2nTddiQBxbrHKR\/Edzf0x\/k18ni3JU5HvX7Xk1SNbA0lD7Kt9x9hZ8kW+xs6HoM99oOp6omwQ2RUMW+8CfSvQvhJ4Q8b6tqunJotiDaybJTM8KtCsRzlmfseOnWuv\/Y2+HcHxU1DxDoF1H51tiCZ4\/UZYH+Qr9KvAXwK0nwpYWkMFmgW3QKmRwoA7CssZjlQm6XLdnrYfC+0gqnPymR+y\/4Cv7bSr19RgWCYKgKL8wVyDnB9P8a7nU\/hZY6jeyG7gSVDIJBvGdrA5BH410WmeL9G+H6Xcd6wjkl5VVHUDiuKvP2pPhvc+LD4am1o2mvMNwtgmSvGRnsOOa+Zsp+9Hc9lcx1\/hz4Z6bp86OtlAjDnzNuW\/M16Nbi30+FFXbxXkEPxYgSwjvd++yclVuF+6cHFQXXxXiuRuilDjttNZqtCHqbKjUn8R6vqmoxyQOMg5r85v+CifhtIbWw1mONQySEF1HQEYP8ASvsGz8aDUZguSN3FeIftu+HBr3wP1edV3yWyiUNjoB1rShX\/ANopz8yKsOWE15H5UTTeczno3WizvHt5MhihB\/h7VSD4IzTixzuB7c+9ffcvQ+N22PRvCPxAvND1e21O3cCe3I8xOodfX6diK+9\/gH8R7b4h+Gmu7V2LW8xhkjc5MfGQD+B698V+Z+h3y2WqW08kfnRI2ZI\/769x+Wa+sf2MNTGh\/GbVvCCXPnWurW4urJj8ol2qZVP18tj+TV8bxHl\/1jCudJe\/DVenX\/Muq\/a0uWR9x5M8SlRzWTqk13aqWjXkVu7JdOuDFMhA6butXDb213ERw5Ir8qox95xnuePKi5R92R5xaape3VyRcSEJn7vrXX22spbQjIycViavpg09y5QgDpWGusq77M5Ir5nHVZUqt4\/EY4eMaMve+Il8Y3uo6i5jtW8iM9SvWuY0vQniRg8jTOT3PWuiutUUqwOOma5TWPEwtFJiHzZ656V2UpYjG4T4vePR9zn5oluexS2kDFVUoeNo5q\/Hqkpg4+5jpXEx+JWv5i0rgxA8AVa\/tmGO4GHxGTyzVVDLcVXaTlZrzO9VY06WqLeq2z3652YBrldV0X94AGxxnFeo2E1rcWI2ujgj7vrXE+IAsF65jOAD07V0TwtfBtOTun1PCdZuVrHB3ltc2T5WUgevpW\/8OY4Br8c80vmnp81c94mvJ\/Jk8pSSRgcdaqeE3u4GW4k3xuD09K9SSlUoubdgq00lzcx9n6PZWU+nSGJQHCYHNeY+KdFuEnaSI7QGwfmrI8J\/EGWGJUeUBumGrtb+7\/tDTYZUVHA+Y7R1Nd2I\/wBqw6hJbnnfxfh+yc7f+Aw+nbw5kfbnp\/KuH0Pw06a\/KrtgRnpivR9W+IlppJ+zvE7zKvTHH4muM0jxAl3qklzxuZ859K8JUHhKicJXj18jSfLJcqPQJ9KENgkkCqH9T2qvpmmRGKUTsz5+83WobzxHM1osdsiuoHzM1Ys\/jV9PRNq+Y5\/h7V6eHxeGr1eScrnRyTp8sol3RfhbD\/bL6rImCT+7U9BWl4k8ORC1kLuuOgb3rkLz4v3NtugaYIyjJVe1cRqPxUv77VFKO8yLwo\/qarM4RqwVLDx2OzD1FD4jqbzwncWcBnjHyJyd3SsBvEhidoZIFDL0J71rwfFiyk04Q3koBUYYdw30rzfVPFWm3+oyJBKz7W5bbXRRwtShQUqc9TkqxjUn8J00XhMeNbgrI4VT\/CGrJ1z9neHRLoXNyjSwMchd3A+tVNF+Ii+FNWjuAGnt93zIBzXtFx8TtK8aeHnEckaOU+63BFe1l7koNz3M5U2tmcx4W8DaPBp6RR28cQAxgCvPfi3penaMrKjReaR91T0rTXWNbnv5YTceVbxg7BAuBj615d49Qtcu7ztOXPUtnJo+t\/WavsbaI6aNH2a5rnFWNoj3jng5Nalx4dF8mwO3qAprKija2ffyAfSn2Xid9I1JCZAyk4w9e5C8paHVGkviiczqmnzaPdtE4JJ5FFd54mWHXHguhGo3DnFFdNPFKUU5LU05UcR8I\/hpL4x8UWgaMm0VwWGOtfqp8KNMtvCnh2CJVWNIUHtivnb4V\/Da18GRhyihupOOlb\/xN+MUHhvSWsYJwhxhmBr85zLiGvmeMVHDRvFbf8EmUkveOO\/br+NF\/qvhqbQvD9zLFGpzeSQHlk7rx29a\/P7SpZhMI948mQ\/MjHA\/\/X6V7\/4wu\/8AhLnuPPZnSXPIOD+deSav4Kn0O48xIJL7T2yD5Yy8fvxX6dkU1Sw3sKr996mlCtFv3j3L4O\/H2fSJ08OeJLb+29MlXAhuR5iypjBx3De45r0Xxn8OPD2pW13qPgq4u9QgFvHdfYjEXMaFyrHd1wpGeR0+lfJMIla0gkErSJFIDDdRDDJx91sdD716t8IPinrnhTXdPvLe\/ZzDmBoHZVLIeoB7nGflPBzXbicLCp7y3PQnTjVjy1InNeLfD19pniE2d\/ZzWl0MHyZ0Kkg8gj1BHertppgghG9GXPtX3DY6f4M+PHhqO0u4l0i7tQv2WSUKVcHqv96M7iPunGMcEV4f47+D13ot1q9vbW89zHpbqtxKsZwitny2Jx91gDgjj6HiuJ4z2VoOBw18M6a5o\/CeC3kSqWQHg1nfY3hVnUHitLXbeS01JR\/AxxWzb6YJNO3EckV3Va6gk11ODm5fhJ\/BOoMZUQtjFempaiWEHDEkV4\/oQaz1HA9a9q8OES2aFh2rxcdDVSRhV\/mOY1zSdsRJHSuLHh6bUrwIAVTP92vXtTsRM+3HBq74f0CCNfOZFGP71cNGr7P1PKr1LRM3wZ4Th0u0ixGQQOSwr3D4ceELTXtVsbKS6uI3uWwZLGye6W3HZp2Hyxjkcsax9F+GniTxT4fN\/wCHrFrmx2mVruMBlZF6rGNwyW6A9AQa6y88R+NPh74B0m21fQNO8I2V1NIXs0jdrq9TaCrLFnczDHQ9f0pUsudWp9Yru67HsZfgZTcalaOh3dv8TPhv8Epp9E8FaRLq+q6isk+peIYttw0Thtpe4mJ+RdxwFB4x0wKydV+KeneIrUSTzW8coZgTvAhlI\/iGTmRjgYxxXl\/hXxhpHjXwvb3+mi9mtGy15Pd2Xktc3TEmV3RRliAFVRjHp3rkL3xja2GnSy6fHL58fmQrc3u1RaRdoYgANmM5Pc+vp79S83bqj6Xlttsdp8Q\/iVLxq08cKPZw4srFZGQxEnAaUj7znHQYxnmvmzxP48fXpprnUDvkB3iEx5UYUY\/Luep+X1rG8WeOpL+RxCrGOIkR7h8wXu\/481wup68l1ZmABvtLSAtITwwwAFx1z92umjQUfe6iczcuNT1Hxpq0WnWubqaborrn8yegHJr2zwl4ZHh2ySDarEfMzN3PrWZ8JPAZ8HaRJqWsW8UGsXYwkYcloYuDsbsCWGTXc3N3A8fyHc3+zXhY\/F80vZU\/hX4nxGPxscTW9lH4YnM61eTwhmAOKb4V0651O\/SWcsqZ+Va0LgC7kChABmuw8OWCW8aZQDbzXi4nExpU+WW54nJ7Sd4Ha+H9PitIV3ctireq6gttFkFQAK5XU\/E8VhFhJFFeY+MPiK0cjoJ8j614NLDzx\/wnqwlyF\/43D\/hLfBl3GgaWaFDhU\/3gf5qtfDt7HLZXLwOMYP8AnFfTVr44N3qkcKM0zn7yn7tcB8Sfh8q6lftZxGGOKVljz3OBx+fT6iv0nh+nPA0\/q0z67BqVbC\/4T2\/\/AIJdT2sfxH8apIQJjpcMqL\/siXDf+hL+dfo3q\/jW0sbY8gYH96vxs\/Zu+Jr\/AAQ+Mul61Mxj02UGxvx\/07y4Bb\/gLBW\/4DX6M+JBqOt2txHBIN4HysDkHjjFLOYTpV+fpJH1eWOFWjyPeJN8QfhpefEbx3pviG31i9trWC2YeRb3BWIZ4xInRvUelUbfR\/AHw9gurnxPq9jNNId0hLoZX9jivPfibr3xB0yz8O+FtMtNQs9Jv7gi\/wBdto9wiXjg+mB0Hc16Z4T0H4ffDuyt7g6Ra32qzWbRXN\/4iuUeWdieoj+ZsnnoBwa8+NNygnN+lj6XDYR1Y80IOb7R0XzctPuMfxT+0t4MTRRZaRoWvTwKViQxWOyLkZAGcdRzW98ItHbxV4NtvEv9n3GlRXymSOzvU2SY34WTb\/DkDPuCK3fB2lD4gahbXN7YQi0t1WOLdB5SuF6MI8nGOcEk\/QV6r4gRbay8pAERRjC1jVjBRslr6nNiY\/V6vso79bO\/4nmsAWyuCSoQD+7Wb8UZbfxD8OvEFk+0pJZSLtP+4ah8RX\/kTOQetef\/ABE8USWvgjWI7U77ua3eKJFP8ZGM\/rXBTTclYwqWtqflhdIIriRAchXIz+NRqTjk9K1fE2hXPh3WJ7K6jMciHoe9Zirk4r9VTUopo+Cad7HpHwH8GJ4y8V3yXSZsLPS7u5nckBUAiYKST\/tla7L9kWWe7\/ag+HrxOZUjvAjM3BWBYnyT6fLniofhmbLRfhhqVmLhYbnxIfLv5lXLxWUL8on+1I5VQB13n0r6W\/YN+DNtrPifxP8AETUrZbUx3DWOm2iY2xBkDSH8EZVH1PtXz2NxSpU69Se1rL8vzf3I0jTla59T+PtS\/tC4jisDvC8u44Fc3oWpXDXrqEchOpxwa9Ri0OyIOIlB\/wBkVdfw\/bLEnkxKjrx8o7V+L1YurVdYweEnKXNGRwOpWceqWhBwkmPu55rk\/wDhXJecyBmRvXFelapEtleuqqjgDkqOv41k3PiKK0LiQNjHGO1dFCphcc\/eXwnLXwDh71Q861zwpc2cMhTEp24AHBrwfxzqU+ju8c8bRE5G5xjNfW0OqWOsxFehP94Yrz74ieC7bVbN1eCKZOo3rmveoYaNOXurQ4LnyvZapPGVKNkD+Kuj8J2eo+MNUa0jjcRLy7kVZm8HwWF+Y4o9i55jHT8K93+GehQabpkbRW6iTqz45Na4itRo1I04LccKvMvdOUi8GXXh+0\/dSyjA5DnNYsCG6uJBcNmToCa9V+I3iWx0XS8Lsa6kX7p7V89ah4hmjmeUsQzHIr5zMEq8lTp9DPnalqeiQ+FLO9TfJhz\/AHap+ItCh0mzMioqqB0XvXD6X8RpnvUt0JJXkrW9q2sXOt2wR2KoRgBa86NOeGcedamrpqorykce2q3EmohbJWjAPLLzXq\/g\/W9SmCwzXTvtGNhXFY3hHwt9nskc27Ak5JI5rfvbq10u7gIykjCuqqq2ISVN8q73IpulQlzxiQePLCeeBnPMuOv+Nct4F8Nanf34BnCc8g967htSTWYDHuDkd60\/CyW+iOJ5FG8+o6VnKnDDxkq8tGexVoRxMI1qUTrdO8EtbW+6WXeAvIxXl3xC0lNOmleEkFuMelela38WLDS9PeQHOBjdjr7CvGvEnxBTxJc7EiWNGbg5rjpUcNyylQTvft+pVZwlFRZwWsaZNEDIQxLd6o2jLaxkHiR+pNet2fho6taARxebvGM+lcD468E3OhK7YO88j1FephKrxC5GjzZUnT95\/CYqaVHdRO4GZG6nPNctqGktZTl0JBJz9a0NHmuE3jcd\/Q57UtzK7S4ky7nu1e2puMuVdDehS5pe8YRuJHJBUlhT4PHUvheUNLEZYj1VOppkt7HZ3gEmOTU95pttqag5G016dKv7GSbWhz4mm4bHQaB8TLXxXdpBDC8D52necZFa\/jT4fySWInRPMAG5SO1cx4U8MWVjqsE5i3qGHXgV7\/dqJdCyhAQJjC185mNZ0K6xGF2vqVhOWrPkkfKl4VRXjkGwrwc1x+qWMd1IWQh3Hoele6+IvhtLqNqXt0JeTJ4HINeBeJ9OvPD95LFKGBBIzivrsrxEMTd05anXWX1d2kaWn695FusLtyvqaK4KS8laRi0mW9aK+h+oxerMfbH6E\/EDxjHoemzeUwBA618RfEPxzfa7rrkyN5Ct0z1r3DxlrsmvyvDuOw9a8u8R+Ahe\/NCvzjpgV8Rwxg6GA96sveYpuysZmha4s8KIzfMK7TTFEyEqMk15g2jXmmTYZWBU9PWu98J60gREkIzX1tfDQn79NmbplLXvCQS6e8sYV8xvlntkwomHqOwYfrXN3WkSSRyy2DEBR5bpIuCp9GHY+9es3skM6jy8Zrldc051zd2riO4UYIP3JV9G\/oazwuKqxn7KsdmGxHJ+7qfCRfD34sXGiXEVhqD3IKyozSBv3ygYyik9QRn3r62+Gvx6jtYpXS9S\/JtxANQuUAl8pSW8m4XnJycg4x97rXw\/q+kQ6zldrW16BuAfjPuD\/kVN4a8VX\/huXyZ8sVGN6nBZPr3HtXrVKUK693c9hNx96Pwn2n491v4CePNRFr4g8N3ngzWpEJjvrBJIlnbaSrBVDRnceB0z9eK8k8TeCW8LHZGRLZzAmCVTu4\/usezrwGHY1V0r4prrWkWtpK8AcSI0bzhNq5xkc8rkjHpzxXpXgiDTja6lpGpWyy+H7+ZbgWcM4V7SfAyYi3Iycnqc5YdhnzK9GShbqv6+RzVaCrR93c+fJIDb6mhAxk1694PjD2qMRWh4z+E1p4Y8B32oxWcetP8A2ggtdXt5pPMSA5yJYMYXbtwc95Fx0rN8ErPc25EMMs+wZbykLYHqcVx4uUp0NOh4leDp8sZGxKY4zhlA\/CtLwd4fuPF+swaRayS2sNwdtxdxLk20O795L6cDOPfFUNN0rUPFWtQ6fpdnNeXkoOyKJCSQBkn2AAyTX0V+z\/dWFl4ZD2Fg1sLUXS39xexKftNxgKGB6iJQCAO4JY9RXl4GlOX7yeyOPB4P63VjOfwxOt+O3iw\/B\/4L3J8E3n9kajPHBb2CsqyzQQBkEjCPkbuWOeuSCa+FfjJ+0Q4+Luia1qOnt4jg0rTpIre\/iu3ivhdY4uJWPykq3Hl4xjd0JrpPjz8VNTv7ma1jlMF8BI08yghsscEg9QDjOPavkvxHBd3d68tyiXksg5aUMSP1619nhYXd5+Z9hUfu8sT3L44+PofA3xYm1Lwlc3Vr4c8R6ba6xZJbSkBXuLceZKAeMiQMp9w1cW\/jO5v9MW0aVvJzuwGwzN7+o615Bc3N5eT263c8k8dtGIIUd8rEgYnYo7DJJwvcmtuPVxZQAk9BgDua7qlJfZOVSN3VdVjSE5YggYY9SfbPeneD47e1v49SvIB5oPmQW7chTn7x9\/SuZtJWkm+03PzvnKJ2FbGn3Zmm3MSWasaq5YuMTxcwxEnH2UD1ew8azbSrylgf7zZq1B40kSUKr8H3+tcDFKkcanb1681f0u0n1GchAzBjzXjywsXqj4ajRlRn7NbHpui+Jz5oP3q7SHxMxTJIG4dK8kS2n0mPzWz8nWqU3jZtzRg4\/wCBV5GMyz6xONju5PZ6RO08WeIRIGCzqhHYk14t4m1G4ku3867ZUbtEGOf5D9a7G2lk1eYmMNKfbmo9T8DTXkWZEbJ\/hxXdh4UMDyqR00ZNfGYPwqZNQ8Z2FogMaSTwjk5Z8yqOT+OcCvcPF3hxU0m7mnjw89wX+ccgb+CPxFcf4B+DmqeHNa07X4z5b28olW2IOXUHOD6Z\/wADX0r408N6B458NRyQXos7ULuuEkBEsWOegH6810LMcJWrWo1E2j7jKsRFQdFnwb498By6VqboEAR45TnsNpB\/LBP5V9Z\/sk\/tC6d4s8L2vhTxHciDxLpMS2qmU4N5brwpB7uowp78KfWvO\/Fer+D7gl7fVbe7edZI7cLkh1EbrvBPQHA\/KvmfxHpV9omvm7tHlhnjk8xJYzh0cHrx0NfQ1KMcfQ9lPR9DuVV4OtzwP2p0+30rxL4fNg8UdzC6Y2yfNXL6b+zppkeo\/aIIorZCeSqjNfnt8Ff22\/EPgSaKDX9+o2ycfaFPz\/8AAl7\/AFFfYGmft0+EPEWjCa01JYJyvzIxAcH6Gvlq2Cr4Z2km15H0dDMJODVGpy826vY+pNL0nSvCmnIFkDSquMk15n8RPiPZWu+NJlYk8BTXzB4x\/a\/S7Z4rO587tlD1rzq2+It34t1TzLi5b5jwobgVyzo1JrVWQR5E97yPYvE\/xEkvLt4LYedIT68D61X0+xe8jzdkySv19BWToXht7kpNGMj\/AGa7rT9NaJRvGMVyStHRGt7nzV+1\/wDCuOHwfaeJ7SBRLZzLFcOo5Mb8ZP0bb\/31XyNAhllWMDljj6V+rXjTwQnxA+H2t6A4Gb60eJHP8MmPlP4Ng1+bfw4+GWteNPGA0S1tJBeRTeVOCv8AqiH2nPpg56+hr67KsXH6rJVH8H5Hz2PpctVSX2j2\/wCFPgCCz8C2msTrLe67exmLT7WNCxgiOR5gHeViTtHqQeOa+7fgV8Ob3wB4D0zTJFSK7Ba4uhFyBI\/UD\/dGFB\/2azPhJ8OtC8B2tnHZWCC4jQRm8nG6VgBgYJ+6PYV7Uuq2drFn5cYr81xecU8c5xb0v1\/D7jzlWhLlIIoJNhVSRj9az7\/U\/seUMpBHUZqlf+LUMsqWzDJ4Hc5rnLrS9Q1LEoYIzHIFfC4qUnCXsfekdlTFQiv3Rr3N6LiCVw3TpuPSvOvF00gtzKHwgPQGuhn0u\/skcSuAjDnvXlfjvUL+ANEYy0PQOvQV6vD+HiqFqmk+x87jcVUXvVPhNPTPGP2JkjlKkHofWupXVI9St\/3cmQR0J6V4ikVzMFPJAqW38UXeh3CRyMQh43Ma+wnCUaXIjwIxnL3onV634fii1aK5cgAtyB0Ir1Pw6kcOnRGIrsK\/erhfDtini+FGlLEMM9a1Nd0m78N2JFlLKYyOhr5bB4fEUHKpVV10Oqm5L7J4z8aJbm38SCSJ2lZ+GGeOOlctp2j3F\/CZ5w5J557V391pB1iYS3QeSUE53dqj1XTo9LtY8A56fKetZPGxk1TgrNs9SVPkp8xyekaDBDeSuAA7V3mnWMFtGjvtZ8rjdXM6fpU8k5kC9T92tqWynjCltwA5ruqKrh7uornDUfPH3Tv\/AClh04yBwEA3FicAV4d4l1O7n1iQxyMwLHHpiusvtXvp4fKIYxD+8cZrBgt0urokoAx\/u1xRrzlPnqRtYxpqJq+D7i6hceZLv3dcCvSlYT2QUYzjpXBQWL2yK6AjB6CrtvqzxIx5B+teJir1pOUXue9l+MUIyp1PhOZ8e74GJMg+X7o7CuT8OE3l0PNc4LcVv+K431V2+8fSuetLK40oCRskDpt7V9Bhklh+S+p5cJRVSX8p9H\/Dmzja2ihRgxPdu7VofEn4fySaY9xs819vC45rwXwp8ak8J6pGJ2whOBntX0hpnxO0PxV4dMsd6jNt5UsOa9bAYZ0qf709ideFSEaUT5H1TTlsruQgMjhjlfSuTvb0w3bBTkntXofj+eBvE12Y8GNzkV53c2Au70SLtDA\/lXp06cHFzZzcksO\/eM3WtFlvE88Zyeaj0FHhlCzEkA9M16TBBbpZhSu445JrjdV08QXhljb5OmKiji3VTpM6MQ4VIcxqX9\/IAkdmcP2OeB9a9F8OXes3OiAXbI0W3qq4rg\/DemRXUyXEiA7Oi12N544sdGs3inlEYIwB0rxMZzO1ClG76meGoP3azOz8ISQbmicrvH3gTzXnnxu8DaVd6dNPCn78gn5VzVnQ\/GVhqETyxMQxyvy965DxJr96ryIk5nUfwMc5Fepk+InhZulUgZ4\/BzrqNWlI+aNSs307UZoTkhTwSKK6jxhDHeah5oTYW5x6UV+l06ylFM4VznqWjwy3k4yDyea9H0TwilzCN69a6Dwp8MNsgdkOfXFekWPgsW0YGMY9q\/DswzqnGVqTsd8qdzwvxT8MIbm3LRxBXArxfxB4YuNBuHKowAP5V9xXvhnMRG3PFeV+OfBEVwrgxgn6V05RxFOMuSbumZSvBny9Y+I54J9kpbjitW91uOS1wSCcVveKvhy0WZIlIPoK801HTLy0uQhDYz901+qYXEYfHK6epKV+p6T4WtdP1S2MN5As0TdOcMp9QeoNZHirwkdOSTzFa608AeXd5G6L\/eXt9eh9q2vAGi315CmyJgOu416ppnw6utQQRTIZEcYYFeCD2NeDiMcsurtyenYiliqlGp7vwny9dJeaC5IzLaZ+64yAfUdwa9V8C\/EqfVI0Se4iukSLBUx53ngjOB1GO\/Sva9J\/ZkgZg6RPJbDkRP8AMU9h\/eX26jtWxY\/sp2drci5tIViJ6oVytOtxRgVHVNnvxqU6keamVPCvxfiU2wa0kjjj5kUIT5mRiTPfHXgj88V6T8NPid4TS+1aGfS7WTRri3EYm0i18mYYzk3MoYbcA8HGMhicHiudPwM\/s5\/NRJUl7lG6\/wCf0rmfE3gjxP4cW+1my1ddOS4jMNxFHbhvMXGAhJz2Jweo\/KuPC8Q4HE1OSGkmEaj+0M8LeLtS8C+KIrG3ivrXwlM10LzSIb9pJ7SJdmHinChnBJjwpxuyctjBPR+HPixNZ+F9Unv7uKxnaSUCJ5j5zuzEADIw7EnJ29MV8wT6Xc+CNO1FItXurSaZEkRBM5IhAJPzcgdFABwDnHpWFovie2g0qw0yKeS7ktQWNx5Rjw5PT5ucgAdO5r7iVKNWN4ihNr3ToviHrsF7q8897K4kabLtI4O4KMYPfglvxrzC61uwudUN3cOSCv8Aq06D6D8uvpVnxhaxPKfnaJ1D7uSCDnoSeM\/41xN1LFblEi+aZv4O5J9666VNWsjSbH6nq0E0mY9oGSzHbzVOBXmAkkBZ255HQV0GleFxHF9ougHmbnb2WrMOjNPNiNa6OeEdIngYnFpS5ChZQ71GR81a9vbGFgSK39F8HGRMujVo3WgtAjZTFcs5puyPBq4iPNcx9NVrqVE+8Ca9p8BeHoLS08yWIeY3Q+ledeDtEaS7810IiQ\/ma9UTUfstqAuAQK5ZxtoZxp837xmX45aCytnwRyMAL3rxq50S\/vpi6Exq54r3ax8B3Pi51ubln8rPyxJXZ2fwXtrwQeRu4IyrDpXzGLz\/AA+GnyJ6o2tZ3OT+DXw4nEcMb2zSysoJyK96b4Pgqjtbxll+bHeug8EeF00KWCQy7di7fwr02JIpLd5VYSZ4G3mvzmvW\/tOpOca3vf3TanS5l7x5baaLaSxKkkYXZweOtXLjwjFcWV2YkCf6M4UZwW+U9utek6d8G\/EGvyC4itFsYpCQJbt\/KDfQdT+Aq5rfgzSPBkn2fUtejeeZWQQWdq00uMZYnkbQOnv0GaxyzhXOaleFb2bUE+umnzPVw1CKlGVSR+VXjL4fSeFPA91rVzOpubfESDZgEt8mB2A4biuE0+8i1LwvFBflvtcYKRzHk7gflU\/gQK+wPj\/4Nl8Q\/Dy\/ttLgcRROl1DHLFtZ9r5+ZeccM2Qem6vjWGB5LIuQEuYpC8iAYAUnqB9UX86\/o7CTdSN2e5iEouMYnN6npwQtIPvn78fXHvWQUKOcHHvXQX+9IkYq3QhvpnrWVcRFjux19O9ejfmRxbFrRL8W90nmMVUnrX0P8O47e7gjdHVsf3a+Z+Y8HGQf0rtvA3i+bw7dRSKzGAn5lY8CvIxmH9rHQ9DDV\/Zy1PvnwDqgWBIvv4HG6u0NyTIAy4BrxX4S+K7bU4oZQ6kEAjac\/wAq9tjjW4CSLgowyTXwNeDpzcWfU053XMdBpEq4QYAJOK8J0Brf4W\/tL+IvCD6YscPiq6j1m11RZQGUTAjyip5YedvA29M5PHT1iDVBb6gkQPQ8+teLftw38EUXgXVrJkXXbN5FkIGW8jzI3j+mJFXByMZb1NVhsJTxzngq21SNvRrVP7zzczj\/ALPKa6H2Hb2MFjZHe20js3XNeVePfHr6ZO9skzKF4+Y81yn7DnxXtPjLPe+BfF+o3cOpeUbnRb0S5d41z5kDZB37B0J5wuMknj27xr+xXq+t6ibjS9bsr2Fuf9JLQuD6YwR+tfI43hPG0K3sklOPeL\/Q+RxDnXoxnh46nnXgHXzqkoLEtnqDXs1pcW8FsC5wMVi+Ff2bvE\/hJ4ojbQSSNwWFwhyfbkV2178K\/EltYPJLp8rjHIi2uR+ANeOslzLDztCjK3o7HZhKajS\/efEcHrniSwjkYMwAHA4rkNQmsr8HIRgf73Q1l+P9Pu9OvJUnjeKQc7JF2kfga5Cxe7lmWIEogr2oYOpHlnM82pjo80qPKbl3YQFXWONcdlUVx+ueFxeK4YYGcj2rurS2kC4Zqne3hSF2fqP1rkzPM6kI8tBanPRgcd4L8RTeDZfs9ym+DPDV12tfEux1iLyLdSWI5JHSuR1+EXcbiJM47+leazX1zpGohCrcn868qhi8TiqTgp2J5uSex7Fa28csu8r8zelVLrw6mqagmFDIOawNK8RPc2gjQncR8x\/u1tWPiP7NIAp6dfesMFhuWvz1z160lUpcsDp9P8JwW8efLAAHSsTVdMVrllaMCPoNvatyz8XxNEFdhvb9Kp69rkBgO0KXxxtNfdzjTr2k3sfPVPd905+90qN7cqpVMD+KvKr3xFHpevNAxDopwxXpXReIvF1zFFKqKyk8A44FeW3UUk0jykl3Y5JPevPm6eKdvshSSSufRXhG4sdTslkBVgRUmtaZZRkNEBz1FfPug+LtS8P3wjQnyvQng10zePr1p0aRwVz93NeWssjh5PmV2bNTcfdPQbvwmkgEsTgDqQ1cN4ovIbBZIgykjrtrrtP8Z2l3peJXMc2OhHWvF\/HusGbUnETHAPO2u2GEpVJx5NzGnLoch4vDXEpkwRnkcdKl8B6o1lcEyysoPHU0tywurYtM2a59i1u7lOg\/u19VTjz0vZPodlGVmem+Kdbg+yF43+cD7zda4Gw8SSXOobXYBM9u9c\/PdX9\/OIwz+X0xW5B4UnhtxcKjcDJrojh4U42ludlSv7WHKzpNX8QSW9upt3aQ\/wB3bVOw1n7Ug805c9RUfhm1fVbtbYqxIODmtTxd4Qk0cLLCNvfiuRzw9Kqqdlc82pUctEa+l6u0EJCDOeCRXl3ju4u9U1hfmbYp4HavY\/A1lDqOnPG6KzY6965\/xD4RWLUHO0dcg4riw2Mp08XOUl7xvCcorlOd0G9ewsscrxzTU143Fy\/mZIPT1NUfE8h0mPI4ArndH1+CSUkkB8168MOqsXVSvc9JzcY2NjVtCNzKJF+6aKe3iaEgDeOPWitoyxEVax5vOz9H9N8OpEBhOntW0uiKqcKK27WwC44q+1uBHjvX8i1cZKUtz3YxRwmoaYqIeK818VaaGdgFzmvZtWt\/lavPtcs\/MkYYya9vLsQ1JM48SjylvCCagu10zmsi4+CVvf3AYwBse1ez6PpBd1yvWu50bw0krqWUcV9\/luPr+0cqctjyoqz1PKfBHwaisoowIQFHtXr2h\/Da3tlQiMZ+ldvpWjxQIPlAxW3EiIOAK96pev79RnXCnH7Rg2HhiK3QAIAfpVweH41O4IAT1461tqyrSGUYrzayp25TrWhgXnh5HiOEXp6V5x4w0aKOzuIZYknt5VKvE\/G4ex9a9mlb9wSfTpXj3xWvRZ2c2cA7civAnP2M1UgdUT4I+OdhbeHtUuZLaS2jtEjl8g\/xZ7xyKeQR\/wDE14ZFq1ymqF3Yl2Cy7W4wDz\/Su8\/aG137d4smi2jzHwxdW6D6V43eXl2NQmuTPzjB+UDOO2K\/ozJoSlgqbn1RpKXKzZ1\/XHkhODvycYbnJ6k1V8M6QFlW7uBvcH5UPQfX9Kx4pPtl7EQSSTyzV6DpWmeXbiQ9GG4Btv8A31xXr1Jexp2MKtS0ZVJE1vKxXAHWuo8N6ZEZQ7opJrnkdYyoC\/MDXW+H0nnC7ImI7ntXiVasoQ1PknOFf4DsrWxiSAE7VBHtWfPpZ1CVYEjzk9citiwsrq8URRRPKRztUdK3LPTf7NTfMhRz614n9qQoTtNnk1stdWam5mXFokelWyrGvCisPWNXSCRIgeh\/eVs+JfEQs7dwvJIwq1wOk6Dq\/im+d4LeUq7ffK8V7FLEQxELuR01JSowtFH0B8KtXivvKQ\/6sDqh6173ax2gtUeJQgA6Yr5y+Gvgm+8JyGa5jncyHoFPH4V9IeHdMkv7FEdG2sOcjFfkOeZRGpWfsp7ndg6jqrValnR9usagltAGdRy7L0r6G+H\/AMPLfwjHBf3sMT6jKN0VrN92Ef3iO7cj2Ga5D4R+CbaHVVlSFTFAvmsjcBiCMA+2SK9bu7uILe3UlzteOLzN5fC4OT0HPJ\/Hivu+DuF8Ng19drLnqdPK3X\/I9mjR5Pfkc78Q\/G15ZWE9rBMYJGA867hXaYl5JC53Ek7cHAJAIxksK+cdS8YX91NLbwoINPvJNuVjXbEM\/u8DnOeeSSMY6jLH1zX4G16wi0n7RKZ0iBZpJAWyoUD5M5GdpPOGG7t0ry3X7JI4Li3uIFDgkPG5HCD7qDPByeeeOMsMRba\/XWr+6Kc9eY8m+JXiXRvDwisNTSSG9UmZJYZQkoGzacZ4YcD9K+RviPJolze3L21pBK7N5hmiBtpW+qn5T+BFfTnxw8HzfFbwZc6cjKNc01PMtZSpLGPqmWbJ5HHzEEja5A3Yr4U0rwtqOtXsts1w0UqFhJNIwEcWDjDcjHf6+leeqCotyueph6\/tVyxWpR1uC28wy28xgfvBOm0\/n0NYqwHdtKFATxn+FvT6GurvNO8M2EeReXGrXMfBEe2KIP8Aj8z\/AJCuMuryaGV8q3kOxIDd66IyZpUXKWTpweMgggMMgdxVeCBki3AZbutXkuxc2u8HkffHek0xzucA89cVUjJI6v4YeINR8L61BPA7vZCQebEp4YfSv0G8Aa1a6\/olvNAxeN0yFbqPavz38Nstvdb1HB5x6Zr7E\/Zu1Vb9JLVR\/qELbf1r5LN6alaVtT6DAy93lO3mlMnitzESBGAD6Cvn39q3VrjUPE9tbIskqQQGNW24QSlQ7gnqxEbIQMYBOeuK+qdK8M\/YdMudYvGSFAjzySSnaqoMk59q+PPidpc1\/wCCo\/GMsUsEmsyJ8lzJve5O1t8uDxGrAKFjGOFXPNcuVJRrKpLpp82LMOaVKUInF\/DTxrqvw08UeH9YtpHhn067humijO3eUbcgyFYDIDjeQ2PNY4PGP3I8J+LoPEugadqunyH7NfQRXUJdCDsdQwypwRwehwRX4UaTaSy3ttJHtjm8+T5Lgh1VlZWQyAxyDbtPUg8IfSv1Q\/YN8c6V4o+E8unWl\/aTRaBdG2WK3IAjhcebEMBRj7zjnklSTjIFfQ5hF2hUXQ8XANRbUvtH1vbXn2hNjqskZ6hhkU+4vbeDKTlRG2AC3XB6D865ubxXbWqlYiGI71yGv+J7ma1S6jbpdxrHufaSARkA5GTz05+lY4KvzVVTTOjFQ9nTlOR6PrKaHqaBNXsrK7jY4BvY0OeM8Fh1\/wDrVxWufAv4e+Idrw6WthMwEfnafLt2ehxyp\/Kp9S12YW0EscmwbgrNIOSME4++vr6n6CjT703UkcwePCuCzqqjGDnk4bH\/AH0K9CsoVJezqRTXmjgVGFSHNI8o8Y\/s26vocpn0KVdZsj\/yy4W4Xj+70boehz7V5tqnheWOIxTxtG4OGQjBU+9fWera0LKwtoCS8jyAAZ5Bwf1rjvHOi2\/iu1Nyjkasi\/u93S4AAO3P97LAD16V8vmXDNCSdbDKz7dPkcUYxhK5876B4Ija32Ou8k5JbvWX4z+EVtNCkqRKJM5HHSu68O6zEZnyGTa2CGGCDW3qOsW9zGd4DIeMt2r46hhKcIW5dQ9yXxHy1eeHX8NSO7HMCn5\/9ms5r+KBRO5wrHj3Fes+P9Bh1lZEjOwHqU715Frfhs222JmZ0Xpu7CuStQ9u9fsmEasaMuWJWW\/lWR5VlIDdEzUmiajPd3pErswH3Q1P8P8AhuTVbxYVchB9416hpPw1ghjDomZAOGrxZXxMnCi9jnrxv8Jw2q6MsljKZVBBUnLCvNRpaQzOjDIJ4r27xdocsEJQucAfcrztNEmvbrYI+c1FKlUwE0quzOOClPQ4a+sYlyzjAz1rC1TUorWPAOTmvW5fhVqurkoiCOFRyzn+Veb+Lvh5c6ZK4ciQJxwMV7zxNCpiOWUz3cHQn7Bc0Shpvi+IwAyNh1GKw9dv1nnMhOA1ZlxaGzlYdADWTrdw4t8hulevSw0OdOBnSpRpuXMS3F0zOVB4+tR2ltNd3KoBkM1c5b61JDcbZMFT0LV678LPD8OrXKzykbB8w969WcJULHFWTpqRPpfgcW9is7RdBmtVtStF082ssSoOm5q9P1i2tLPStg2g44rx\/W7AxSmRdxiY815ddVJVeeOxhSmmuWRJ4VsoLLVzMm10Y59q73xIbTV9OECKolIwWrz+znihspDFtDAZ5HWk8JeKgmriO5SNzvwCK8LFUHXk68L3iawg5ysX9N8Lat4ek8y0lYRt1BFbEmnXVxDuuMvJj5gw6V7AdLspNBFzONu5d2a5S+lsprDzbfDkcGvLr4mouScldy6noUKKcrSPEPGXhhL2Ip0z3rjV+H1vHFwCSepr1LXxJcRybF5rx\/xD4u1XSZZIVgIBOAzV9llksRVh7OErGteXKuVEd14LW2f5dzL9aKy7bxxfzR4aNSR3zRX0CpYxaN\/icvKfsnHGAKWdvlPpT2baKqXEwB9QK\/h9JyZ7nM0zL1FQVJ9a4\/ULISS5Pc11OoXI2nPNc08nmS+9fTYGjOVrdTy8TNLQt6XZrHjj8a63TnWILiuVtZAoFaUF+EHWvtKOKpYSFpHEmdlDfhRxVj+01A61ycV6zAAHBq7BlzkkkmvNxfEjS5aKO+nd7m+mo7zVuCYEAmsm3jwMmlmvRCpwa+VlneJnO52RgnuaWoagsURGeleL\/GfV7X+xZ\/McRvGhk8w9un5jn9DXYar4ltrTLXM\/lxA\/McZP4Acmvlb9qn4kJpeh2KW960Fzfs4NsFzKsAfIcr23NjGewNfonD2Cr5vNe77p0RWp8S\/Ey7vbzxNc3DMgiOVTbxuH4\/WuLL+YoCYIJxljwK6q+unZLj7UpaUEsnc7M\/xemP5muYlVEkyqEuc5XOAD2zX9R4eCp01TWyMXuXfDVqXuC5IA+7kjJA74r0H7VFFaIsY2KDgN\/f8Af\/0KuU0G3McSKOWbKHviuj1FNhRMfInA965cRLmZwY\/\/AHdxPXPgl8LX+IepRvPGfsqHJGOCK+r4\/glp1pp6RQWyQxIuM7ea87\/ZYvYbbR4FjUAKAXavf\/EfirzFFrAAAR8z4+7XyeKqNyaPDwvs1BSZ5xpvgSwsUmEG084baOtcn4y8MJchLaBSZnPCjqK9H1HUVt4fLgyHbjf0zWfYPa2gdnHmSv8AekbrXzdWgpPU6PaRPO\/D\/wAI7eW4R5081s\/x819A+DfAFlp9pGFhjQKM\/dryrUvGqaVrFrbQsvnSPwq4NewaHqt79mWZpfl25+4Kt1fY2gjrwdKnW5pG9F4XtLy5y0S5X+8K6O30W20+1Y+UnArzSz8ePHqMqyTDCnJLngVsXnxCF1bbEIIP8VcteNKTU6m4uelT5j0\/wJqxgj10wERyC2BX5C+AGyTgf56VX1TUY4dK1MSz7J58BAys0shA+Y8A54XqowODx35X4feIVa+vUBAkmtpFBxnHGc\/pTb26t7m3nknvIbrcpZYbWcj7SwBO0yhQ2BhifmbnI6df0zhqopYBLs3+d\/1LVX3DmNc8Z3Xh\/wAUXFkgcCKJVCM5VWwoyTv5PJP3T9etV9U8Q2fiqGJHc2V\/twjTyELMAf8AVseS3Trg88fxHGB4ol\/tC8ieWSQbiIgGWF2APTad4JX73JUkg8jjiheeFpzprXVtHKlu6GTzI4yu9c4\/iwp\/Hkduma+rbe6PP9r8RxPiq\/vvD2qi9Mbpc24JmgmUcxORnpnhjjpy75xhF5+I\/iu9zqnjXxNe2ZKaXbagLTA+XLsmdzD1IRvyr7X1+\/Q6YbO4uWIVsJ5gwqcHoRjY3zY2HnnjGRXy78Qvh1HrtxrF7Y3B07UltxJIiKFhuPLIJ3KOEIB+XBzhDyc0+VVFzGmDxShU5T5su4zFM4BOM0R3kqIYyd0Z6q3IrWi8NXN84Lz28TsSCshbcPqADj8arvpDRXAgLRySDoqBsn6cVndHu2KtlMUcoCQrcfX2q5ZTGKUOeR0P0zzV0+DdTSRHFsyDG4BvlP61QubCfTlKTxNG5JK8dsdjRFqQ2mlqd\/4Tt4p9UgjllCI5++3THv8A99V9l\/AHwDd6N4ie6kx9mlh8shGzXwvoN7++ti7MCiqcr1Hvj24r6g+HP7Q174P8OpZRxtfahIY4rVCHaIEnGTtBOO+Byf5eDmNCpUhame3gKsILU9++MGpWXiTW9J8EafZ2viW\/kMs2o6ZLNiC2txCUVpyM7TuddqkZJ5HKCuL\/AGttO0jwl8OPh54bjWJ3giuTcSnrIYrMgMf+Bc1p\/AfwnrkV1\/b\/AIiEA1X7J9kXyIQpdTJ5sjynJLO0hyeSB271xH7XazXmvaMnmoBZ6Xd3Tb2wE3PFChP1LN+RrxcLJLEwoQeivr3ep04hP2E6k+p832kqaRoWh6iFknjnndneVSxJWTbkhiAcoV6\/7PavqP8AYS8V3Wi+OtV0iKZxb6haiRonubqT54m64kBjB2sMkNnG3GQa8j1LwA4\/Zu8Maw6qAby7EhdeMH5uR2\/1ZruP2VLhtF+M+hIxZI5rjyHjaG+bG9WXny8wDJReWAAyx4xk+\/iJqvh6nz\/BniUIeyqwl\/hP0ct0d1yxOD1rJ8faydO0rTLKyxJ55y8rRkhdx5+fIC8EgZIz6NyK66S3VLUDqSOAK8X+JOoNP4vt4o7OBI7NIonv5EImbBz5aEkAAA8kHJ3fUVxZPS\/et+RebVOWlFfzSPVNS1WS2aGOCWHMkoAjlkZdwCnlcdPcgEcEcYIHS2l8jJFNcoDIExuBDfk6nBGM8Fa811WUTT20cm1A13hS\/ILAHAC5GW68ht4AHbGdXXNcXw\/pWqXjrJi0jEjgmRycKxwAwDc9McnOMc8H15a4lHDCfLQcilr\/AIvm1TxJcojqLSz2xoW6szY3Yzxj7q8FlzwdpKkX9Guv7YmQSsTbJiYurZDEcrhvcknH+7nHSvLPAAebQIGKiW5vmabehVg0jcnLAAMCNwLgZKbg43AV6Rod19ntQgLSIp\/1rZHnMc7m9h1x2A9OlenJ2R5MJ396RwfxItEsfE8t1ZgRx6gv2o+WBtVySGAxx15Pue\/WuN1DUL10KIcDu1ejeLrgXmg21xIhJinaNAYxEFyOQg6leM5PUn6geY6rf+UhVcZHUt2r8xzGh7LFSS23+8zqPmRTuNXBjKOo3\/3lri\/Ek3VY1Dyt0X0qprHiWWC9K4BVjgYras7FJ7cSHlzyS1fOzxcHzU4HPCEvikQeDGSzIaU\/P3NesaV4ltI7bap81yPyrxySGWO4dC3yDkY9Kq\/8JLLpNysa9M\/davJwkFFSqRN6c5c3LI9G8c39tNbtI2EbGdq9643w+sM0wcsEBPO41ja9rVzqEJfaACvJzmuWstfkhiaIMd+cfSvNzKlVxErX2Ouikpcx9UeHBYPp4jQIRjmvJ\/i\/olq1yILImWSTJLBeFq14M8UG2tBEnIIwM84PrTvEOsWiykTtvfI3Y9fSvksL7VYuKqv3Yn11SolhLQPmrxb4Bu7SF3VQQOSOhNcXpngSbWldZRIgB4C19JeMrzTLvTzCrKshH3u4rgPCup2NnqD29yqnY2N6V+rYbFP2bVKV2j5CtKUY+9E8a174Zy6bKMA4610fguaTw+hyWiC89a9g8UWEGqhXtkBTtxVLSvh+dUhcPACp7ninVzh0las9jmpfv9JHnOufEa41G7ht4pC6A\/MRVrUtbik0sblG\/H8VbOu\/CmTw3K0ohYwnkNjO2uA8QloiYsnjpXoYbMKeJSVJ3iwng4xqRZzt14muUkliiIAJxn0qz4LlZdYW7nYOqNlVPQn1osvCr6lEZNpPcmuf1vUH8N3JRGPFevSjRqN0YLXqaVaU4L3D6w0XxzBrVlDFcupIXaE6AfhWT4lvotOs3KNsTJ78V83+DPGs91rUbySFI0PC5rufiJ4pN5o6xq5VmHO014OYZfOeLp0lpFHoZfSVKk51Je8dHHrCR28skpBA5Feb+LdU0zV3YgKrg1BpvicDSWicn5Vx1rzu8ut17KVckZNe5luAlTqTv0Hi+SpGLia7aaQxMe3aaKw4tdltmKhqK+l9hLueb73Y\/a6W5wOtZV5eBQearXGoBV61hX+qfMQDzX8OUcO2z0Z1Lakt5f8AJ5rO88uxIPNUnnMjVND0r6KM5UqfJE82dmaFuTkc1q2qnH171mW3DLWtbNgDvXmVpOW5cIpbGjbLkgmtSGUJWQtwqGnfaSwwDXmOnKo7I7INGrPqYiUgHpXH+JfGkVij7nAIHrVnWpnit3YHtXy\/8YfFV\/Hfw29vIsfmyeWZJGwq5PUnsB3r6vJuHauOrxpuNrmyqxfuo9I1nxdbeItM1W0a6VDdL9khVQSZHf5MDHPG4tnt5dfL\/wAf7JLwSvLIX1nzTHLEiOv2aNByCT3O5Bj\/AGTXosPjs6Fq2kaPbOkz+X59msv7kT\/6xTNPLxtUON3rj\/fzXivxQ8VS29kq6faLc2h3NcTyne0mB8qlwO2PMOO8hznAx\/TmVZbTy6nGlSR6aiow948c1i5n0vZAiBAreUd+3cwByf8Ax7PNY9pam41MIgIRjy7nK47sT+dT6i51TUWeDYIixkJjyQhPYFjk44q94fUi5mt4jHtlXB3rnpzx6V9h8ETl+Jmt4bt5bq9tYdgcu6japHIxn+Qrq7zwzdTTofLYAH+6a6v9nL4dSeMvEWqXSx77XTo0jzu3je3Aweh4DV9EL8FxOwzGPrxXxmZ5pDDVXS6o+dzKtNz9lAxfgkx0fRLa2TKBRz7tXqV3q+0lUOdvLGo\/DvwyGlJlCcY4Xb0rR1Dw+YISirgnknFfKLMY1apx0qNR6HF+IfFf2aB3Zh8o53HpXCXfxWlaCRbVDJKenpXUeK\/Ckl9C0Sq3zGs\/wz8MCkgMqE8\/3anE46hFpJ6hOEnLU4fwdb6rqXjiC\/vncl2zhz\/Svry2vDHoSgHY4j\/pXmkXgEafskRCJFOQa6iVpxpwQE424NcKxsa9Rc3Q9vBVI4eMlI+fvEmu6ifH0ry3kr2kR4jU4HX0r1DRvEpuLMFCwGP4q4\/xL4WkfUzOsRZjyTitPTrCSK1QYKKOtdeY4qEaMXBXZ8xWl7StKR6l8Ntckm8XabAxJWSYxkDqQwI\/rWrr9xqM\/ia+sZUMVtYSo1nHFk+YjIBJjPG4kS8DGA0RJ6VwGi36Wd\/bm32mWJgwPoQc16L8V9P8uew1i3ja5eW1W7DKNzOhAWZFHOTuAbYB8zbcnANe7wZjJVKdWjPRxafy2PUwyUo8pFrGmzyy2F+t1LJEFEIEbkqVP3WGDjqT68MvTrTJYZorb7Wq3kBlnhluJre6MXmAKAd\/mEqeABkYPOQWI56Tw8kWveF5WuAZEiJilbrnjjBIwecEYGMhQOBUelWxLXVhMxS4BeMyR8LJn7pBAUHOegJPNfqad43Q+TlfvHk3i7SLNbuCKyu5Yr6dhGY2OF+Y5OcY+XB9Djj5jXyZ8afGlr4O8e3mm6ckn9o2UQt5PLYYifHRMcDClfu4HOAB0r6p8d6Bd\/2nEts8lhJJIYl8obGDFSvAYr0LpnA6ZJUAjP55apqH9oa54jl1F5J725u33XjH5g5Y53Drg+vYit7aWDCU4upKpKPwlHXrjVLLUpYrqP7PcKAzRs24oGCkfzFULPW5LSYyhwZx\/G3b6VY126e++zzyLlxGsRIyAcDHH6GshbTzMHcB7+tTKB7tKo5e89zZbXpDKJpHV3x8u4sSapX2uXGqOPNI2jARvSoG02VGCuCN33Wzw\/0NWP7NNum2TcGP+zUpRNHKTFjvzZygozbgEwc8DivUvhV4l0651W0+3LscP8p3EIj\/ANCRkZryO5jRFI2tuIADGrvh28isb+J7jcIByxRsEY7is6tNTi4lUanJKJ+onh\/XY9D8OR6qmr6fLpiIrMuoTbTj\/ZlXJJ9AVJPrXz38dpdQ8R3WvavqNhLpr6hFp9lBayvlraJjI0aN6MSu8gj+JQa89+EvxFuvB2qfbha6bq0lqQRa6gn77afuSQtycn0wa67xj8Q4vGviHTDqiXmmXMmqnV7y3nhY7owirEqlcghUjxz3LHivlqOGeGrX38\/x\/pn0Naft6fKe6at4PM\/7FtsscZL2EX9orleWUXDbj\/37Zq+efAdy9j4s0fVIFjkC6bBevtS6di1rcKkyhbYjOBGSQck5xyDX1r4U+J3hS6+D9h4YKalqMsuk\/wBnyQ22l3D5LR7TzsxjJPevku1SztNLsrOcT3Vxp99NayKIJ2Yi4QQvEQjxniRB64LL04NbYGbanGXd\/j\/wUcOLouPJI\/Vm51VF06K5G4qyCUKw2nnpkHp16V4mSr+PZ4POe4kZo\/kkuAChOCVBBU7RwAMHgc81b+EHjpPGXw38PrPHOJWtY4nVreWMqFDKGIcllHykjcSTgZzmsXVbuPS\/ijBZQMzpLbefguFHDybiSeAOOpGMdCBxXs5bQdKk+bdnzmZV\/a1I8u0Tvri\/NxrNoIhDcRozb4pIlfkgMBh8HOCTj5fUbelcz8UNcnuvBV5BawtNPfTx26wpkEDzETAC5IA+bkOcYPXAAo6rrQXUNJs5Zr22dt7RyaajAoBsLP5RLbumcNHIQPvlcknO+Jvi+Wz021hhcveyXyKrCLyc7gzFtmWAO0JkghRnjyznHSoRhN1euxyVaz9jycx1unXlvptgmmQl5LlgFvJ2QFi\/GUGACckZPqeeF5rqLJMxoSGHRdqrnAJ47nPI\/H6CvP8Awfpr21okkpV5HUH5j8uD098dMfpXeLHcz2bojR27t8rS3AICnpgntnv6DgdjTu3qzKDKfjWK0j8H6m8c4e7UpN8zFjkcEA59zzjBx1NfP01+zmVWbknmvUbrWTqfhHXiR5onJiMrDJYCU+WckDtnAGcAgAkcnx258O6heOWgzhiAD61+d8Q1JrFLkXT\/ADLdpR5jB123VYzIsZc+ijJrR8PaitxAiMTuHG1uM10Mfh2e1twJEySOtcjq1\/FouswxMFQluhNfGwwU3V9oZRnGEeWR3EWjMts87jqK8O+JPiD+zNTCIdhzX0DZ6lbXOmozSDaVyeelfMPxYQal4ilMZOwHIr3KGEXJ7NimuZxlE6jRfE8Wp2KBmyWHNUpZIlmYjABP51xujCS0gGCw\/wBml1bWZbONWzz\/AHqeKwEZxXcvCv2blznZN46k0RcIcOO\/pWU\/xThuDunmLgZOM8k15zrGrPer5aMd571QsvDE8qGUhiTzivOp5VhlHmq6M9X65KPuo63VviSlypD48wfxDvXOadq019qZkXPJ61xev2c1he4kJAFdP4Ru4jGCCMjvXurCUsLS9pRW5jKsqu59CeB7tbyCKBzuPQbua968G+G4IoA0oUqe5FfJHhTxnBp2pxR+aAQfWvojR\/ifa2mnRu8gJx\/Ea\/Ks7w+JVROzkmenleGi3Kcvsno\/ibwja3mmSbQrBl6L3r4++J3w9FpfzmPKkMStfUnh7xt\/wkNi5iJVD0Vu9ea\/EF4rq4kjliG5ujAVGXRr5TWh2ktT0a3scbH93H4Tw7w1F5Nk8LgA45rwz4rQTtrMgiBkTPJUV9J6joR0yKSRiQnXivM9RtbHVbyRPMRznnjFfpmTYlfWXVir3PNrpUad5Hi+iedYEScg1p6j4kknAjc\/drsPFPhqCxtGkiwCB92vKdQdhMSeCa++jTjWlzzWp49Or7Ve6ak2okQsQzc1kJeFps55qeFGkgI61nmB45+ATzXZBRV0dPK0rMvXFsHYE9TRUU07kKNpora5jHnsfrzd6oXBANZjSvK31pyWbOeTVuO1CAcV\/HEMDUjokZOVyGKM1biwp61ExEfA5qF7kx9+tT9TqzdmiXZGtFOEH9asJfBV9K5sX+xtzHimnWAZMA8H+7RHKqlTcUZnWJeeaeTVqO6A4U1x6avt4zgVftb0TDrzXq4XLY4d89rsbm5GzfyfaoXQ9xXjXi7w1aR3s+rahlLHTYZbuXaAS21SQgyRk9Tj0Br2\/SLA3SoTyx\/vV5H+0JqdhZeFNX0a0DzaleQNG8MCFpUTdtff2VV+Y+udv4\/e5Dh6tTFJrbqdWDpyqVYyPnnxbe2UljKLCa91HUfsBt765uEGYzIu8+WV6EQpnzOQC23HBI8Z8bePtD8VPZ6Npg1DTdFW3Efm3KiW4Ix9xAp25Y9T39cV6d4kji8E6DbeHWlg\/tG6WWSO5jUiWdHJx7BdmQc9yozXzvdWk2n2O8pGEaRsSp1bODgHrgADpx09a\/ZMPGL977j3Kj+yUcR2doIFdcb\/AJhuGWNP0q6xPJKjLEV+Uyv2U8dO9UpGRTtMSuT+GKsaXBAbqJ7kMlqsg3tGMsEzzj1OOld9tDj+E\/TT9kL4awaB8FtK1Box9o1lmv3ZtpJQnbF+G1c\/8Cavbo9GhU5CrUWm3Flpnh\/ToLCPyLCG0ijtYym0rEIwFBHY4xmqkOuqZSA3evwDFYiWKxFSq+rZ4c5RlPmN5NJijjJwK5LWrZZbooi5J4rp\/wC1E+zHnnFYNt\/pF4Txkmooxadzr5tPdIdP8BRzpvcDn2q0\/hCK2+6gBFdxptiyWwyQRTL6FUQseBXHVhyy5pB7M4OfR\/MUqB09qrDQCQUK\/J9K9AtNOWQB8A5p2paWsMIdR9SK19lKK54g6Oh5nceDYZU+6M+lcvrPhAqGSNdoP8VeyR26MvKjNVLrR0lHIFW3KcDz54Xmj7p5Z4Q8AoblXePKg5Nep+MLH7b4V0+KLP2vTkNxCqk7iFyJFGOh2kEe61JZQRWK4GFPNeTaz8VDo37SJ8OS3Lm2l8P297aw5+Xz0mnaVAPV4dw\/7Zive4PVaGbNuV+aD5vwZpThClQ5Tf8AhvFFourPpgIWzkHyGMnaUIyvIH8JI43YVZFzzmtjW7AabqkF8cLHOv2aYRqQSVJ9AOOuMuACpHasHXbVdB1gSWiM9vFIDAyn5PJY71cZHO0licDAG7qVFdpfWL+JtMS5hXzDeASKuc+XIp6EgE98ZyOCvcmv3al7vuFT96PMcJ8SPD\/2ieRUkCC8i88fOmGJOMj+98xBHGMydSSCv5sftE+A7rwb8Qr65C4ttWLXsTxgiNt5zIg4\/hk3+xG0iv1ZS3HiDw6EjWV7i0c5UbsOCMHhCxJwTkZJznlc8eYeOvhFoPxF0q+0bWLKC7RsXEUq53Rk\/KZFbjkEqSe+Ryc7a6NyKc\/ZS5j8qbe4ZbaRDkxtzjsDSBDJmSM89SnrXr\/x6+Bs3wh8Rmxt3lu9PmgWaGeRfmwSQVYjgkEY\/Fa8jFlc2zebCGdQNxYDp71SVzvhVpz96Eh0F7LGCquAp+9HIMqfwq7G+4go+z\/YQscfTNFt9mu12XKFJR\/HGMN+Xf8AD8qmjszEf3N3Fgf30yR+dRJHVBk1tYW2oERybkcnJeJGx+PGKsQ+GJNI1q0eZ7Z4BKrH5s5Hocis+Q3cjY+0O\/8AuvgflVi5utRtdPJlj863f+NmzhvYjp+Nc7u9DeNtz3efSRFY2WsaM6Q6jpkiXEDSEbWibgo3+zuGPYFfSuv+F4m+MXi\/xV4skt2jtY7AWNlHkHa8mIx2zkbuevJrwK08aa54w8P2OhxLZWls0gt5XtogJpxkH5ufmHHTp0r6L+Et\/c\/CXxpa+CQIo7W8NrrAkK+cWQRuHUcjbmZIjz0+avMqYOryvkkr\/p1OiWY0oy5ZRZ936L4bstM0m1SCCOIxwiMHaMnAx19a\/Pr9onR7bw78U\/HWlT\/Z7ZdQj+12yMoLM8iiWPCk5JMykccDJLY4r78tPFt7ZWMcoXy18v5RsTcTgdDge\/8Anivz8\/a+nuNZ+Oc9\/HtkeW3jgLRqOApbJJIwMDrn09Kxy3LpUqrc5HDmGaKrTtSR7n+wpevr3ww1SJrhbRtPvmQCOOVMFizBW3OQQOcCPgZ9a7a211Nd+PUv9nXK3ttpumyrd+U3zW2MgqQVOSWftk4HPevEv2GPOt73xfa2kRkmSWN3K\/LI0WHDAOZCp+ZeApP8XI3Zr3yxGmeGPiT4l8RX88Vtpy6XCZbqWYCOKLc5L4GSfm2cgd16CvpF7spJHzFSXNy\/4hl\/Y+HvEt5aandWYvtQsXFzZ3cU7xNCpIbIZSGK5CZB6\/xA9uduoW8V\/ES10yCJhZ6JGbmSWVsDfPISuSR6YbeeP3mQc4ryr4pa1dnR7fSrWeWTVdVItomglI3Ev8zjb14Ut1x+deu+D4dN+FPhKGBALnU5U81vtDNM5k2E\/KuMMflIyT6ckDFcsb25pPQ541PanrtvFb2FvEFmhFwuWPnRucMBjOB8w9SD85GeMfMMG7vRLb3ty+oPeWWmWvmWiMiIpmYEl+oJ+UBVGBjLEFicjJsYdT1e\/F7ewfZ1G5o41X7zBH+chepxjn24rV8t38PXK72j+03tvZLtbactt3cZ9D35PqepmT5tEdqldDddsRpXgXSbKNxAJfKjd1BJYKoJ5Pvnn+XQaOi2ljHYoBtOOK5P9obWZdE8O6fMjNKTLgSIpGMgnnP0r53v\/jxq9jbeRbRSMe8ueBX5xmdWp\/aUo20sjZV40nys91+IPiuHR7h4rZ13j+H0rwPxQbnVbx72WVpHU5Xnp9KxYfGNzrV4Z7uUvK3LA96vPq8F46xKVUEfeqaFL7TPOr4lcx0Vh4kkg01EaQrkYNcb4jX7Td+Zg\/NXRWFgl7Btt1YBefrXP+J5zp4UyrjFc86yjV5UdGElGZUtbTfFkc1l67aidcJ1FamjX0c0eM5z0qea1jN0A54roxnMqbktzRvlmcXY6DtuRKQTzXoen2MKaS8u1QSKnTTIUUGMAg0y4BijMES7Qa+cVWeLTutDSU+RHhXxTQm5XYOc\/wANYWl3cllZjy1Jkx92vY9d8EJqDGVwHJ5rl7\/wlFp8ZyhBr6ihiIRoxoyRVOpG55OdTv7O\/wDtJdhJndXb6L8RL2eMRyOyjGCaoato8bs2Fxisu3stjMqqwIr2a9KhXppzSub0sS4+5E+rPhX8SIrXTgskuHbj5jTfF\/j6ObUEjDglzxXz74curm1kALNitK91KSPU0nlyQBxXxFbJ6Uq6lfud2Frzi5KJ6p488aW9hoD+YwEmyvk688X3P9qyzwysgLZxnrXZfEjxI9\/ZsNxO84rylULEkmvtMlyqlgqUnvcudWWIv7Q765+ID6jp4gkJL4wSK5G8mEjkg5rOAIkGM1akiCpkH619EqUYPQxhShSZYs7ryQfT0qZrhJJCcAVTt4S445PpVtNGnkGQCEqJKCd2yp25dS5HDDKvLDI96Kz306aM7RnH1oqOVfzHJyrufr4+yEdao3WpQxKdzLmsfVtYeMEKckdfQVwmo61dTyP5Ryg6u3SvwKpCMTCUjtL3xNHADtYGspfEqzOecn+7Xm+p6xKJwhY7z2FWrGd4l+YkE815tSjJrmZEmd1daw0yYLYosC8jKd+cVy0dzuUHdXRaNepEMuVx1pUacndXM73NaR23AkYxW7pVxt2jg4rm59UjlmwCApqymsW9rEcNyK7XSaiL2h654d1iGFWkfGIVMjfQDP8ASvmnx9qVrpesz3M09xBKl7OL4SkpLPbzzSuIgScEAowJ7Fce1dWutTalbStHOo+zSG4CM2AxEbgZ9cEg88cLXz58TvGdt471y2fSbA3el2rG0mvrx\/LgkuDIoOSH52\/J8xwCYyfp+g8O4d+wdSfX9D6TAa0vaS+0cF8Z9Wl8QapHPqely6bcpOY4p2L7UtTGvlRhTj\/V4lLcEEnk8V4tq2riaZlgi8mBDiIZ+ZR\/j0zXUfELUWbWLthdfbpHiUGWNvMAUBUyzdyQqnj++3c153cys0hDliQTknqTX6JQp2ikazepIH5yev8AtV7L+zR8OE8eeN7bUNTjR\/DukzJNcxSE\/wCkuOViH4gFvb6143p1hc6tfwWVohmuJ3EaIO5\/w719tfB7w\/a+EdD0\/SomU+T88koGDJIeSx\/z0C15md4qeFwrVJ+\/LT08\/wDLzOHEVeSJ9J33iea+j\/dnqKqafeTiXLt3rM08IsEeH37qvIf3ueDivxr6rPZHgJylKx1kl\/stOWyxqzod4jTj5gSTXH6lqQVMbsYrnI\/EUkF6GVyAD94GvThR9lE9STjTifS9heqYwpYcCq+rXSshC+leUaF4vuJkH71n\/Guut9Qkvk+Y4XvXHXoe1XulQrRkdJoWqhl8pj93gVtzyrcREZBBrhJnSyhLo2CKrWnjhI32Stz9axoqdNeyq7HS6kbe8ddPDhuB9KY8JMZf0rPi8S29woIcDNXlvUmh3KQUFGIgoQcoGF19k5TxBrJscg5GO9fFXxk+JCeEf2nNL8Vy75bbS47NbiNOS8LLIsqj\/tnK9fY3ixBOrFV5r4G\/aZtBN8T9UUgIClquf+AJ\/jXXwHGtWzqVSptyy9N0ePWnJNRlsfdv2aDXPCVldmeO5itB9l+0xMAHspiGtplOOn3cEZxg981s\/DzxLM2k3NnHGsU6MJFg5LRqDtY4BOOMEL65GTzWZ8BrOK4+EvhbSrnD29zosNu2SfmR4l4PPQZP5msnTtSu9E8UQR3A8ye3\/wBElDHAaRGwBhR\/EADnGBwV7k\/uGFxcMXT9pT6NpnZFWVj0zT5rnTdfD3EIcXcWZP41LdGHJ6biegVcEdcVV1yzbT9VR47eRLdZN0YjRiu1gVwMAgdSBjkZA44rTur9NSsCsyknKzx7lyD8vPBDY49sjbjtUt\/5Oq6eHeNXngUpI0uCMd\/vDI9cEjjB9BXp3+0Uo83uniH7SvwytPG3gSR4UFy1kv2mF1A81o2GGAA4+6A3HHyntkn4P8PeGV8LePbWy1CJJLaWY27mZcAK3BPPTqCM9MGv1RtNNg1DTHiuIDIInaIFiCSpAOCFyMZ3D8Bx90V8TftAfCiXRtbuZVLJaQy+VHKgwIh1ib0HUA9P4evJreE+V+8cFWlK94faPl34xeBJPAfiZrYQGO0uP3tvxwq\/3ffqK86ku5Eb7wOPUA19dfGnRh8SPgrZeJo0C6tpcix3g2gMjgCOQev3grc9j6Yx8p65bhWguMeW065IxxuBww\/AiifkelhKrnFKW5mPKGHzxKQejLximRXMlux2OwU\/r+FCuYmKnIXPSmlC7hUBZieAO9c7SPSR3PgK9WwkS+jljhuIZlZNzbCG3D5h6\/QelfR\/wDvr3xz8Zzr2p7xBDHHp0flnbIsY4yuOjb2B9j6jNfNejaNc6fFbbkMbvku2BlfT8q+tv2bfDzwamDAZQSseXVyACGDemD0HehvmjY4K04xnePxH102k39nbSxi3tBYKnlxyESyzOOgcnJHPOQee1fOvx++GMwt4PFDFZYbaKctbr8jOf9bISO48kTAZJ78c8\/Uds4ntowygAS4KsAQAeSDnHoOhx\/Tn\/HNpBrN74a0S4eQxXl1ceb8pI8sWMyNxjuZVHfqe521hhafspbnPiZRrK58dfsV6rc2HxQv3W5jittRsvsru0UIEsoZiCpU4Y5Rsk4J8zp3P0dq2oz6T4kmubeZZLyK3lAkdkUMqyRthtwKKNueWHZjg9D8r\/svi48L\/ABdtISkpuZL1dPL+Sy52ygBTMpy+DFzGwKZVcNkcfWnjixWx8aRMqeW7sQO5BaGXpx6qO3XHXpW02lW5TiqfBzHkfxE8NT6X8Z\/C+qPZQ22nS2TJb2sBcxRXBkBk25hi+Uh0I+XHJFeyeHNAtpZvtlyBeyTSCMsXyOCMgbfoePzry\/4q6hdXnizwY88FvZWsN0JTAAzXnzQ5L3BGQpJ24Ukt3ye3t\/ha3SSKCSRySozhU5PGAMjGMbsgducA9TrOPuxbMKMf3komrdg3NpPIsbeVIpU7iADnAI5GMj5jz0A5xyaq21r5n9iQMOZdXuJwrSbwwghYZztOMsRxkdDnOWrX1K3ufNt0eFkGDOyZxgfwjg5x97GAT8o78GOazWPxvp1skgeOw0yVm8o7gZHkAIyVHfnAYdBx0FYJdTvcSh4v8Ix+L0uLS7jEggli+8MkfI3OTnjkd68X8afBC20mR3jTMbdiK+hLa\/ttO1LV2WQS\/v0VlXsdje3B45H047nmvGerpqNvII8OMfdWvyzPa0aeMkk9dPyOn2MZU+Y+OPEHhhtFd\/KT5c8bq5S2gvzfLL5mFU4K7a+hvEWhR3CP5qDJ5+lcJfaXZWbAytHCf7r8ZrlwWY06kvZ9TgqYOahzSNDwbcI1nFGqb5WGDjtV\/wAc+Gba90sQvAkshXJbuK5i3v47W6AtnC4\/iDZrqn8STS2QjNuJZNv+szVyS9tzM56cZU46nj2j6a+mao9rhiin5d1ddf8AlRWW9wAwH3qSTS5f7Ue6Hyl+enSodXnlnhliK4AGc1nWqTlJRidMahzqeKfIuPIBzzjHpXUWPmXaI6xF2P8Adry27tpLbUmnO7GeQa9i+GN4mpeWr4wvRWrHEtUqd4G0aHtJHWaH4Yiu4WknixKAML6Vx\/xE8MeczywQhI1O3A7+9e+afpEaWoYBQCPvVw\/jlIZEkRArD1FfFPG4lYhO3uo99YWjThr8R8l6zpbW0zrgk1lQ2YQ5bGfVq9F8baekMhyeSc1w2p2xjtXdG3ECv0jCVpV6aZ48oxhU5S7ostnGxE2BmjxFHFcgNFjAFeZvrl1bXjq2QAeK2bTxBLMgLE160sJKFpHZTjKL5jG8V2ckoI5IFcX5ZRjkV6tqiw3dtu7kV57q1uEmfaDxXtYGtePIzobsZYTLirE0TCMcVJplm93dIiqTmuh1PRHs4QzggAeld1StGElFvUlrm1KGg2aSSAvXY3gt7ayH3QAK5bTR5Z+UZqrrN7K52ljgdq4alCVaonfQ4pvmlyGiL+DJwo60Vy32hl4zRXR9VXcfsn3P1M1hfOj2IdkQ6t61xOrXKx5giXkdAtdB4j1b5jBEwRmNc+qxQRu+d8mMZ9a\/CW4z0Z5Mpe8c1pejy6rr8QlzhGy2O\/tXc61ov2GzDhcbR6Vj+FpRHqzMR945rutWb+0I4oIomIHJOOta1VSdHmJ55SkeYNcmJX4IxSwatKxBOQxOAK9N0\/4aXGrxqoixn+LFdTpn7OzSPFNPkBedi96rB0pP4kdFOjOovdieMtdXIXcDjv8ANVOa\/vHBG489NteweK\/hi9g6LGh8odTiudsfBJuJAvlc4wK9aFGMNWZVacoy5SjoNg1j8H\/EGtz3Mkd9DPm18hMtuVc9ewyRk+3qa+YfFlsugtfWaPdJb6dBJbOrLgec2BuKn72GMrAnOQma+pvEniD\/AIR7R7zTpAtvaaQ3mpNAefM2u5D8cAguC\/YMAO5r4u8WeIreL4ey7L7ffarfPLOiuPNeIMx3GPPyhjsP+Oa+9y+m1BRXkfX0IqnRhE8qvNSlWF1DsqMBgE9QD8uPYZJ+vNYB64ySa0tReN7qRVYBN2AcdBVAIByc4r6uGiMD0j4L6bG2tXd+MOtrBt3EfxMe3\/AQ1e9aJ4geKZSrFTXkfwwsjp\/hUSsMPdyGXp\/COB\/U\/jXoukGJow56ivl8x\/eVXc8+t7x7RovjfyIkWRs8cVduPHxBwrYryyfVIYrRMHDj0qlaG91G5Ai3Fc9e1eR9Wppc8jD2Siex2\/iVtSiwG5PX1pk8jRqGzzmsPwzpM9nErz5JPtV\/V5GjVs8V4uKlGbtAmX707TwprKIM55zXoul6p+5yWGT6dq8B0HU3jl4DMc\/dFd9p1\/dy7ATsT0ryZx9lKLnIVuVHea1fN9mcq+WI7V5NrniC4jvdm4gg16NCjS23J3ZFeeeKtBkkvd6qTj+7WdSvSnKxhUi5fCdN4T8Qz3CBXO8Meua9O0e6f7OCxwteU+BdObPKnI6V6M2+K1\/uba4ZVI89jvo0XKJsX0ST5PGK+CP2mLcf8Ls1eMLgKtufl9oYj7fzr7EuvEV2jFUQEZ5NfGPx+u2ufjVrbyYDiCJjx6Qp\/h6\/lX23CcE80bhtyP8ANHFmUFTifYPwu1w2PgHwlChYPHpdpyO37la6Lx1bM5stX0wRxnVENu3ycR3SfMDgdQVBBwPmCqDwMHznw5KNK8KeHkyxdNOt1IX\/AK5JXf6JIfEvh3VNKdmSRo\/tduVx8ssfz9+BlM9eMgZ4zWOQYqphMwlTrP3Kjt8+n+Ry4et7SNn8UTvdAura40OKNkMc8EcbKhYcxtk4zgA\/xLwOffNWdE1G7s9QCWdxZsnANveyfJOOuVI+4eVIyRnJGMqMcB4euPNu7eJAlvBIUUKo7SfMB2JIIbORnHOFyorpr2Oa2v5I5MFY22iT5RgjJGBtIH3c\/VjjqDX65ytqx3qr73MaF1r0Gja7A5McEF0g88x3TTRKN2MBmbcSPvdMYDckgZyvit4Rg16weWe3MiFfKlRY9w29B09Dken4AZ3RZPcaAkpj8tFG5l3YEY\/iH+uH3SOrEYA9TirXhidNX06S0u1JlhHkzLsU+YMAbh25BGOSMqM9OahecbPcqcbv\/EfAvijwzqfgnXNT0jTbpZtM1iBo3tbtHZJJFQkR8cglQwB5PCjpxXyb4z0PVdHur7TtQh8ifT5mEsIGSj5CPk\/gp\/Gv1Q+M\/wAGm17SLtLJxbalalLi1lXbgMvzxvgdjxnhc59zXxr4z0yz1jX9O8S3lnHGGYWeu2OzmKQfJISvOBtJ54\/hNa0\/fg49UedLESw1XmnE+S1DZA555rb8LE2uq2t2EEjRSBgrd67rxd8Fbzwn4p1PTvKkurWBpBFIhGcbcpn2xjnvXKeHbUtqUMLsbYSSKvmbwSjDjccDPDEH6euM1hFqWx7VSqpQbgz1nWdH3S6ZJahXiutxB284+UjnPTB\/9Cr7Z+Ceg2OgeG4bRHhkkkXc7knJbHr3H0r5G8H41Pw+lm6+XcwDz4kbjKKWEqgnHzR5buONtfTnw5aRvDNlc26COC1DnfEP9g9eTnnHBocWopHzMKsvaOMz3GHVoTbod68MrbgQM5z3OP6\/h94cXo+tRax8V7+dXzbeHtP8jcpGDcThXP8AAoBEaL0ycE+pUYWv+P4PCGjXN3cK8xiKKkUSv5kjliEjGATliD\/PkcHl\/At5L4c8HazqeoOsV\/eyT398VfIWQoCUyX5CgYGT0T8VzjN2bOqdTWJ86\/DqO21f9qdpDGyxQ+JZZRJHbBsAXLNzIZOMHHygH15wTX118TtUW38V6T\/pK3AZgy+WSABtkJ+9jHT1x\/Ovhz9n27\/tL43wa\/NEDm9kuyuF4YtuAyxJPBb7oyMc\/LmvpS98XS+IvH1o8L+WtnFLL8xJ6JjIA5JzL0XnIXHOKcleomGIqKC5UWfFRv73xT4UtJ0igtFnWe1s7O5ZsKEAL7URYVPP8Pmsc\/eNfSnhopploglU3N6yjbbschQMnJPOMk57njPzda+a\/gna3PjTxNqXjLU7qG+m3G1sHS3liiWMclwshL5PTLHPB4HBH1SLEadZr5aoghQBpD0UKMnAIGTnce3\/AAE11TfKuUMNHm5pGGXurzUTJdgBHuBGE8vdiMEZGCOeAx9ee4wRFoVo2o+NdYYWjILeG3h\/exkE5JbLZTrz0yRx2PK6nh2OP7YkjyQukKHd5SjDMcjdkYP3i55A6npyKoeFI5LvX9UvEjli33SbmjQxKApyT9xc8HrmT3Ixk8\/c67fCch461iTQrO782Ty5pL05KgDI+Y9iegYenXOBmuV0\/wAZQXZLGUEj3rI\/aN8RtpuiafDEw3S387eYmCHHlRnI5IA+ftgZGeetfOFp4zv7K7JR2x3HrX5LnWW1auPniI\/C7fkWq2vKfU+o31re73QgEDtXl3j6EXMZPlkBf4q5vRPiLJuWV26dmq5rnipteTIwB6KMCowuBjhnztHoRqRrR5ZGFo1xE0pB3Ag11drqe1QByOny1yLxhB+7Qg92FW9MmmjkC9Rmu6rRi9UclSMX8J2ULLICWxVO9gSaNwF++MfSrkLAxxswGelXDHEYyfKyK8mrh51JXgZql\/KeR+N7OOztHZfv+1Y3gTXb6x1SJP3iRevSu\/8AFFml5OQEUqDWVY6UIJAwQV61DCXpckzp9nKJ6zH8ShpmkGPg\/LyzHgVwt38QG1ed0j5Unq1YmuJ\/oTqWIwK4a31I28+wMBg8Vx1snUl7h0xnLmtIv+OJZ3ucF84rAkkR7Uq2NxFamp3aSrudwTjmuavbpG+RCS57KK9\/DYWGHjFIzq0ZS9443VdNJuiQMnPavtr9l\/8AZf0fxB4Qh1jUbVbm4uBuXcMhRXjXww+Dh8ZWwnuflDdBjj8a+6\/gTqSeC\/DyaTMEBtlC8DANeTmGaYWpJYSNTVbmcJOfLGZ8P\/tRfC61+G\/icQ2kXlQzqSEUcV8\/XXh2WaMuUYA81+hP7SGhWvxE8RxF4mk2jAcfw14zqfwbgS22EFhj0xXBhc\/w+HSpylqdcYO3KfP3w68LxC\/zKoY+\/au08deE4hZjywpBHpX0F8J\/hdpehqJRBDK5OSZowf51k\/H7UbfSNLljjEMa4xtVABWcszni8ZGdHVep6UHCNO0kfHs1klm5B6iuU1hwZzjpXR3+oG9vZGXoDXJ6zIPPI6c1+l4VyaUZbnk+y\/ecxSkf56KhyTzRXqWOnlR9+at4k3agrCQyMT0Fdj4U8L6h4uEQKGKE8+5qr8JvhVc+IrtLq4jJTOcN2r638EfD+30y3jRI149q\/CqWAXMkzwKeGlWlr8J594W+CUFtGjvEXcfxEV2Fl8JwZk2pwPbpXsmmaDGiICorZhsYoRwor03ltOduc9mGFpR+ycZ4Z+H8NmgLoM\/Sukv9IihtiqKBgVqNdx2yZyK5nX\/FUNtGRkA\/Wu6MaFCPKdfLGKOC8eaaDaEBQOcV59FYJA4IHzdBXY+IfEI1DOCDEvNcD4j12fT9MkubJVklDqo39BlgCfwBNeRicTTg7yeh5NVe2n7p8ufGPXE1jRfiFcTGX7TdXn2eSGK5jUxxwjeF56qUQHB67+K+Q\/Hs9tqOpJLYT3EsCQR5e6wpL7fmx\/wLjPsegAr7u8W\/AWHxZq7SywrIVbymdY9vmtGDEJD2zggfhTtU\/Yj0bV7eSVrZlnk6sDyP1r2Z8X5XlVVUasn8j35Rcl7p+brAhic5PrQiSXEqxoMu7BRx3NfS3xh\/Y51nwPDLf6YHuoI\/mMeORivB\/C2kyHxJaxSoUaOUZDdsc191gM2weZ0Pb4Sakjkasrs9q0fSfs+nwQKGKwoqj8Bio7q\/k01iFJArrtIs82Kcfw1g6p4eudauXitomcj+6K8ZTUpOUzllDlJPCbXfiXUUgQMUB+avonwh4ESBIy6Abfasr4C\/CG60XRTeX8B825bILDoO1e0xaelvNFAq5dq+Nx+cU8Ri3hqL0iZ1I8yOeu9FUAbUAAGOBXF+ILB3m2KM161q9q1tAWI6j0riLu1EzliDzWNKWt4kxolPwt4eijC\/IC55LEda63+xhDICAApqpombSP5VB\/3q2lmeVcv1r5mvlNeviXWlL3TSVLmRZtEIRBxxxVi60VLtQ5UZxVGK4XeOcAVtRahGIOuB9a7qGEdzKnGMZe8Hh7QhbzbgoFdBqdoBbMCqjIrG03Xoop8AjIFT6xr6+S5J+UDJNaVMGtzoVRR+Ew57ZA5HBNfE\/wAfo\/8Ai+fieMYHl2O7p1xAD6f419e2erme6lbkqDXx1+0JIJPjj4lYKVL2Kr065QJ6e9fVcGyax9RP+V\/mjyMd+8hzM+1NF8LBtM04SjZ5drEoB9kA\/pXReGbQaL4h0+VGWMidB83Tk4\/rUhuorFkjlJ+UBdvp2qe+0p9WMbojCJCG9zXy6k6dVNb3uejHBRpL3Y+8VNSsJdJ1fULONXlS2usrIHJyjndFhc8gHI9OT1OSPZdX0q3k0oXHzPLM8MuAMH5kPQ546n6fjXDah4fzr8N\/FuBMjWpAIBCN+9j54wckjr09K3PiJ4nTSYjslt5NiQyxx9du33H4nvX9AU60ZRUjjivZ83Ma+iaYHtbm3MbB5OQdp64DZz04zxzn0Nc5JGdD1+11B1d7eUG2nZuwJ4OAAeDz6cn1BHGaT+0ILDUAl5ZXBt14eQRgquOM7Rz6gkY42nBzmrur\/F\/QnuJMzxOhzIu2YBccHIB2twVHVRkkAA9RrGcW9GHtKconpep6fJeW7ysVMsG4Mu7Idf4gOPfcDjOHPIwK+M\/2kfhl\/wAI3r8urW8DSeHtaCxajHvd1STGBIAXAU4z1OOK+k9K+O3ha8t7NUv4ILnhcfao3DOvGMqxBypHRiPc81D8QdGtfiD4N1XToLiC7juoMwyBwXHPyt68NgH3yOpwLi1GXMjnxUI4inyR+I+BdQ1CXVG0lb3adStlTTroyRvlpI1KAl9hUFkETYLKeefSvAtesk07xjrEabRsfdhXyOoP3QM4AByPp617zDqdnqr2s6agtvdzoDJZzJGp8u2naIksSuCFAB25JxynevGvinoctj8R5RGrN57YUA9\/QKMk8VmlFSfKcNCM41XGX8p6j4NtYr69tormZtPh1LE0F5FhjBdBMORkkEMm44PB2sK9M8Da\/wCJtC8M32jT6PLfuk7xpLaXMIWXBzkgnch4HQkHNeQ\/Da9utU0iDTMkW1vJ5UyiJo58qcxurdAR8pGRnjvk19E+G7ZZFgvdWaeK5SMRNeQQbob0A\/ex\/BL2IPHHynFRUrwow944mpKpyIy7DRNT8T6nHq+vsipaoGttPT95FbOSAGyTkvgZ3bQACMdzU3xXv3tPhumlWkrC91eRrVdq\/cQlfNYnJwAoPfrt4HGPRXa0uIYIrES3JYCTyV5fJOOcHAOB1J\/pWV8QvCbppck96xl1SeBreEKciGPJJC5HPbJ7mvFlmEYttnRGlJM+RfhhZ\/2Lr02oReXlpn2KHKkKi8AjHzDlcMhHUZzkCvQ7LVG0uLWtaLsTbx\/ZwV5Ic\/vHABPXLrz2x9K67Tfhi3hyCC3Akdba3ad135AcsTxjjHLY\/wCBVnt4AurrStA0eXaq3d7JeXchI5AbzPxHGK6aGOp1pmddTj78z3L4A+Gzpug6TbyoV2RpI6BMs2ACRnO7k4GT6+4z7PrWpXD20a7FTz2xtUMWI6kgA88KR3+8ODjbXKeBLWXTtJPlDa7bVBYbuBzwAPUj8ulbEEVxqF39pYTSSJGsYDAFem\/GM5PbjPQD\/eX1Jyu9D0qMZQp2NQR3Flol3czN5ckhEMYUlQDtwGAJ5BJ7HuBk4GTwppf2Pw7qLW9uRLI7kbeCG8sYwQozyT6\/WrGqgaPo9tcXLJE8jNtwN3HJJLYz\/d7jt178\/oPim4vJ7mSH5NPRprpivPmBRtAzznIGe\/px0GLklFtnXLljOMT5y\/aaim1DxDo+nxDCRx3EwbAzlpmTOR6+UOMD6CvKbP4fz7PPdM\/XpXr\/AI5mjv8A4iSWczb5LO1t4Gz\/AAnYHI\/76c9KtLBAqGLaH2Divh8bimqriRQpcz5z558S6DPpymSJTGwrm7HxHdW0pR3YIeNtfQPjzRBdaaUji2Z74rwjUvDbwXwUjHNVh5KtDUp4f2c+c7rw\/qKzxAMmSw+9WheR\/YAZoyBIezVU8M6cEESRj5gMZqfxBYzxs4Dgn\/ZNc1Wipy0OuNL7RWg8UXfmkACXHvXaaPdX9\/abtgry3TtKvUuw2SUY9K9d8NxzQ6eNykYH51hUg6S0NaXxGPqVlPCxaRVA+lZcVtcM5\/eYBP8ADW14luHAOQRWZo8xnlKsMgcmnCpKx0PU5zxRplw0RzKxOOledxaYTesCW3Zr2LxDMJY3UYLVw1tZx\/bhu4y3Jr0qdT3OZmcoalSfwldy2XnwwSyAddik03QPA0+oTlmgKMOcSKRX098ONFsrzTYgEVxjuK7Y+CbBJQ0cSAH2r8yzLixYarLDxhqutzTm5TF+CugxaXoNssi4c85xXS+LVkt3lFm+yRl4OKvWtvHpVsUUKgXkL6Vzl54pjmumicAgcZr8rdSricXLErXW4pOMZc8TJs2vbiHF2QXX+OsTVNajtbkx5Eo6EjoK7nT47K\/UieTCdSB0rhviTY2GkWc1xErOMZz0xX02BwVTFXqW0OhYmKfNI5nxT4vutF0yR9OvTDcEY2KoOPpmvlH4j674l8TXUhv9UuZ4QclGbC\/kK7zxF8R0mvzbq+8A465x+Nc\/4guLWXTJpsjeRwtfqGS4WeXNNw1l5G1WpCtTXKeeWdiPs56ZArj9ZgIvGz0FdOmpqJHUNgGsjVkEsu4fNiv0XDKcZuUjn1epjR2pdenSit3T9NaaMk0V3OqTZn7QfDrQYNNsIlRQBgdq9TsrqC0QcivEtL8Zw6ZaDewBArP1H4rys5WBiPTvX8\/riClTjdLmZkpxguU+jF8SwxA\/MDVa48aQIpLSL+dfN3\/CZ3t8cmdgPY4Apw1d5R80zOfqcV5OJ4prvSnTt6sarM9h1z4jQ52JKCT\/AHTXnnibxDPqEgKNiPvnvXNNdbnBJNLqeoJHa4J7dPWuPB5lisdVarWt5Gc3KaJ7vWna2MZbCH0rnjrhhWVH2vHjPvwc1nX2rF5MDgfpTYFFwhRdzu4wuDgk9sGvq8XgvrVDk6nL8Mj2zwRa21\/FsADKzE7vfOT+tepw6DA1kq4BxXz18EtbmhjSyvWK3ikmRWbJGef619I2VyHskI7rX4njozoYqpQxSvyq3y6Hu0trHDeLvBltfW0sTxK6sCCCK\/PD47\/AhfCHxDXWLOMJaXG8yKBjaccV+m183nK+7rXz58fvDcWp6RKGQHZlxx0IFdnB2fVcszBcj9yWjXkFTdHyNpmn7bMDHOK+jvgB8FYLrRv7QvYA89w24bh0FeK+BNLOua7BZAbwH+f8DX3x8ONLj07TLeJUACqBtr+kcwqKMfZ33OJ2bK9z4KtdJ0P5I1QoOOK4PTfDJn1KS7Iyg4X2r1PxtqY8j7NH1PB21j2lqtraKhwGA3GvxvDz9rm9R0XpGP4mtlY828dW0dhZKpHLVw9pbo5BK9f0rpviNqL6tqgtoclIzziquk+GJnjBJ5\/u4r7FYh0Icq3HBIrW9pFFHwOaSSJ+yniux0\/wi7r84+UVoyeD8p8q\/pXM80lf3jaMdDzCW1lc5XJatC08P398qLGhye7V6Fp3gkNMrSrwD0rsbPRorZQqxgYHpTo5rFPTc4\/qqqS5jye08Bm1w8rF5MVT1zSn8ogtgf3fWvTfEl\/Z6cp3sBgV5bqnipbqZwi4jHQt3rtjUliftBGEKcuUoeG\/Cr3t9GgyEJ5r5g+PHhIH9qLUbJIiY3WxX7v9+WFfT\/br7B8EamPtSsORmvDvivpKal+1TaXKrkzHTADjOMTxn\/2RvSvpMhlTwU6k478j\/QzxlJexjy\/zRPoTU9E+0a5tbkLJ91enWu6t7ZLe3QFRgCsOBVeUseGJzmtSe6JgCk8j+KvnvaQi+c9hu7OluNLj1HQdReNMSAwsrEd1jBBA+teO2Wg3WvazeWTyeYWG5dxJx3HzZ5zzg88ntnFe4aNuk0KNQRmRYvlUZySCp\/GuctdIfRdbLdQXG0tjGd3Iz29fxNfqOGxfPCk+lkfO4mhzvmOA1PwDZ6fZQMYQgZgrEDBbgMp5zggFufb24x7X4eWGp38Uc1nEYjwrGEEEA4AwfcdvUDjgn2vUPDw2yRSs0kuwqjehBBzgdzn9KydMjzcwSIjIS4YbsZweCD2HI6f419SnGUTGNKMWeP337PHh172VbmxjaC5ff5AUDcG+Vh0AHJzkYxVnwv8AA8aVY2Nz4Z1i70K5VANkbie1ZgFBPluMZ5OcYP05r2DXLISXEbSbHCZGFUBQchhx\/ETg8nvmo9Hs5byJ0VSBGxHmscbjluc8dih\/Ht2E1bQh0KfMfmj8W9Hvrb4p+LYYoVs7\/Qbhr2H7FEwYvLCJZg7LtCxTZYgE8N06kHiPjhpMktz4f8QWrb4LyFJUeJlOyRVGVPORj5eB\/wDXr6C\/b2+Gkdv460vXFDK1+v2SUEfLmMkxkjoTh1GfQVkL8KLnV\/BWiJcWztLaSugRkD78OQMZ4+6o5Fc08XChH3zx583toyj9kzvhZ8Oho11pmpWbLc2eoQ5uId3zCXCuWX1JXdwcDO31r6e8MWNr5YtYf3TjA2SDaRxkjkCs\/wCHPguIeGra1A2OOA7YJBByO46cdPyr1nw\/4PjmKLeQK8qjBZsHIPpkelfHYnHSrVLs9bDYS0eafxGRpXhWKwuABAjlwZCqgFnJ9O3THFLrHhFrm+tlmIklJ3Mq52qBnovTpwa9Mg0KCxT93Eiccso9sVWXThLPLKCRxgYNeZOpKWh6qpKx4rrvhKMT37eVtjZdp7ds8fnXKW\/h8Ra4sgTfJEgjjLrwCzqTj8gK9k1+wLeewzliTVTRPDdxGDeWtp9s1Bv9XhRiEepzxnvzV4KpJ1kkcdeirE0FhYeF9KSXWbpLNCTJ5Wd00hOMDByRwOn8+KwoPinozXDwabp014TJkyknaM4PQjsQB26Z6ggTD4Mav4oupZ9buxGC27ar72bjqcccgD866Wy8CWngzTJZ9O0r+07lEz9m3Av6gYH3j7Y\/Kv0ejKUoXtY4oKfN8PunBa7DqXjm7kkkWd7grtjiVyV5GQBjgdV7N0PXoOouvDCaFbRaQtmsRuw0Cq3BwsTHIJ68AdB68DtjD4\/3uh6qumXOiPpbllkKyQ+SwHBPBQZzwBxnpzwcehz+MYvFvh6O52RR3CMZE3cMA4xn2zn8q0mko26ih7OUpe97x8MeMNVMnxL16\/TOye7kI\/3NxA\/QCt3wxfNqMrux57LWb43tIxqE8uFyXOSOhOao+GNYFi+ccCvzTET9pK6PQo+7I9H1W2WSzO\/aeK8W8WQRtdkIgJWu08Q+MpGtTHAp2ngnrXKRWDXMXnMdxfn5utduFj7NXZ3zjGRzFhr\/ANildCxRx2rb0+\/W7V5Jec9zXH+N9FnhYzxZQg8bao6DfXWUVnYqO2eK9PljNcyMpw5Y8p7F4WsILhssqnnha9P06wjisiSiggfxV5B4bv5bQBwGXFdHqHxENrZbQjb8enFcE6MpMnDv2cfeKvjmSC2RzwOfu1wdt4gS3J2febrWV408X3ersYkTAPVu5rE01JcAyZz3rKNHl3Jc+aXunS32tvK\/J4FVLUec5lHzVUlt3kbJ\/CtXSbfZCd3Q12RiraHQi5bfEXUfCkRMEr+UOdma9R+DPxiuPHOsfYZC\/mA9OteH+JbUTwFB8prsf2eVk8Ma6NRt8GQHDq3cV4mZZDgsdSlOpC0n1MZRaPs\/xH4Yik8OvKJWt5lTIdq8M03wlr+o31w+wPGrHaFP3h617vqPxZ0u+0ExThYJynzJIODTfAt\/pl\/p73Nu8fXBVTjmvmVkGGprkorlRu4RkrHk1nrMXhx5BeoySx8GNuorwH4+\/GC5ule1srczK5xsPCn8Opr6C+LemRTarJOjEOwOAtfO2qfDl9S1CS4uXJyeA3QV14KnSyq3OtCXQUvdR80XC6gLs3E8TqXOeBwKW\/1aZ7cxkkj616f478K\/2RIVXD+mDXm9xo0xYkKcfSv0fDzp14RqWLhTVNcpxt1K6Sh8sCKsWs32nqavaxYGOE5GDWXpqGOTJFewrON0WdXYOkNuq4orJ+3beN1Fc3JMy5z9EpddnuSFDHH1pYbjB+ZjXP212ERiTyabe6uLdBkneeg9K\/mj6vryxR5x3VhqkEY\/eOOOi1sW2sLMwCDivPvDFuNYul3yqig87jXtGi6X4fsLQGSdGlA\/hNcdTAxcvelbzeiOmjT5tTmdQ1IW65zz\/drIS\/e7kAZ2IPdq6bW9OtdVYi1BI7FRgVW0vwUzyqQDmssLiaGDq3i7nQ09jLOhvdj92D65p9nZNp9wjN99WUivRtO8PCCIccrWT4j0QyRu0abTjtX1Kz\/DwceaQ4018R4R4I8U3fgvx6wDhtNububESrgWzOwYR4\/hUDIHJ6V9teEfEK6hZRsGyrAd6+UJ\/A+ya6lRGSSSZZfMzk9Oc\/iTXsfwu1WW2tI4JCVKYHzV8bxp9VzNrF4b4tn5+Z6CVtUe0zNuQ4PBryz4pWLXemTxqpZ2GAB1Oa9ItbgSwg5rB8SaYL2I+nrX5Vgan1eupPoYO8nc+ZvgV4HfTNXu7u5TkynG7619aaNcrbWRbI4FeY2unxaRcP5aeWjnOPQ1vx60JYViVhg1+44riB1cM68ndtHOqfK+U1biZZr0zOc8lhWZ4g1xba2ZFYb2riPiJ8SLTwhZST3MyxIi5JY15B4Z+NsXjbUzKkv7ndhVJ7VvwZl054WeKktOYylU9nKx7FZaSlxdGVuXY5+auzsbJI0GFFc34ZjN7HHKoODXo+h6E9yyDHFbZjj6cKjhD4jrihljZtIown6VqwaaGPK5rb+yRWMYQAbsVCZFUEjGa+IxeZSjNwZukVjZR26ZJAxXKeI\/EQ09HWHBf0ra1W5ecMBkCuP1XTDISSCc968j+0ZQd4ozk+xwGvXz38jtMST6VweqxlZG28A16TqukEHgZrj9W0pmyMZr7fKcydZpM8qq\/e5i\/wCAP9aAegrmPF2nLcfHzTbkBSB9kO7uMeYf\/Za0dHvpdJnK4+U1Tv7wXPxL0m75wY1yc91SUev+17V9zh06UJPujqnWVSnFf3j2mFvkBHXFW5D5sK881k6XMZ4g3arplOeK+XxOIcWb856l8P5Aum+cxGFj2\/e6EE\/41hw3zXGuzxyD5GnLRSH+A54rpvCVgLXwfYOy7JZX8w56tluOPoBXOmx3anIwHVydy\/U1+jQr1aWGwy8l+KM2rlxbSW5EczySB1ILBflJIHU\/UZ\/KsuaEWkzpjYFYkjAHfIBHQ9Dya6qOwktGlLoBviEhHv15\/Ouf1K3YyPKwyCSDtGOnIyR7cf49K+1w2JfKk9zhnT5dS9e2qXdq7Mu8EeZtC\/ePqR9M++Me2MqC8WK6MIkVA65AXkkgY6+v3OPatDw9JcX0AVIX+zxnO5VPz+2egH0P5c0g0uC3uYzcXyRuhIWNf3p6Yx\/6Cevp7V7UZO1zOcub3j51\/a48JS67oGkMiGS2XUA7E87dy4H6iofh\/ot3Po4juQrrDsC7uWyvBwfTrx717v458KaV4+0P7CLya2CyRyLMUDY2nOCO4rH0nwa3hqe5sptrSIc7l6MMggj86+SzWVRTuvhMYUOatzlbwz4b+wXTvCu0SYYryATXoVlaxOg+XY46gjBFZMAWJUb+71ragO9QQSCOhr5+E7nqwSiTNAqLu5YDnrmqMqiKJ2P3jzV3bkfM29c5x2qtd8jZ6mtX3NDmb3Tjdyxx\/KN\/Ut2rrEhg0rSY0crBuBwg6t7n8DWTJLHBfRSHDhFJC+ppNT8Kah4kbzry7ksoM7lij4bH+0T0+gr28qg026auzlrfCWYrzQnZw07oSNrShgAB1yeMDP4fnV68s4r\/AHx297G2ACNww3\/6veuB1v4WxQJIbDUdRt79wVjZbpyR33EE46n6Dv2B8T8cX3jf4b6l9rN\/N4hsI8ecIEKyxHoMLkBic4\/hbG5iRgCvu6Ck4+8jyp1\/Zr3onv8ArXg9NfAtNXtE1OyjTcPmG5XYkL5TdV53ZGcHaARg1474j8Naj8OvGGu6lLfteaNJakWr427eNvlsOzBvTg5yO4rqvgp8fNM8ZwRB7tJjIcvJJnaAucAAgY45Ppkj+HJyPjlHctqmqjzd+nXtoJY8E4MkRyO+M9e3frWGMbVKVtxJ0qqjUj\/MfLXivUUlcIpGQai0DRZNRBKDP1rA8ZTiyv0Z+N56V6R8NEFzbIcqfWvz2tSdGHOelBc0iKbwk7QYZBnH3qqwaTLZwlCmQO9ezDRklt8lc49q5nWtOjjSTaK+fxOaKlG8md0lY8V8W6Y17bn930rgtJ025tbo\/JkE17tf6T56EY61z0nhxIpwQmOaxwuexcrNmTQ7w9pmbEM653VY1HQ0uInAUZxxxXQafALa2Ax2qGRP3jHBH4V9fRr+2V0EYL7R51c+Ek3GRwAB\/DXO6pbR2hwgAxXp2qp8pOeK8w8ReZNOVU5GP4a9OjTdR6mU3GIum7btypxitl4xBEQANhFcnYJPbSB0JBB+9XQS6iJrTJ3bwOeK63h1B6EqfN8JhajOvmlOWJ\/irS0l73TWE1lctbOR1U1hXU+6XI+XH96tfT73zNi1rUpqUbFUpP4ZGwfEvieVn8zVJ5Ub+GQhgPzFaXhbxX4m0W5JilZ4nOW28AUzToUm2KRnNdpZ6Or2A8pQcjk4ryqkYR0aOqEPaFPU\/irMgcXsTeeRgc5H1rnZviNYpE5kXez+\/Ss3xjo7yTEITkV5Vren3VtMTk5JrleW08U\/eNubkOm1FYPEV+7oQQx42+ld3onwejbw+b0xb3ZS3SvOvAkU8V5HG65LsAK+pllbRfA8kjEBFhx19a8fF42eCruhH4Ec1WpKXwnxze\/D2TVri+mkQxW8TlQqd68t12yTS76SJM5WvevG3xDtvDOny26KJJJMnb9a+eL68fVL2aeQcu2celfSZPWxWJcqtbSPQdNtu7K3mue+aKCmAKK+psjTlPtSbxMqMNrZNQm\/kv5OSSTXNaZas7gscu1d94d0fzCG2nPbivwSvGlhlc83lsXPDWnTvIu2R0Hsa9e8OaY6om7Lk9yc1i+FtDQSoWXAr0iyt4oQoQcivz\/NMbzy5Uax92Joafp4CAkVsW8AQjvVOGUBRViKcbutfE1HKRrzW2Nq2jXHQVFfWaSRnjrSW0v3cVPJ86mvO1jK50RkcjeaQhlbA4brgc9am06w+x3COgAwfTmtmWAO\/TpUsVn7dK7niG42bLUrHR6Nf7o0Bq9cPuXPaufs0MLcZxWm1zmPGa8GpTXNeI4vm90xfEFqGgcoBla43TXnjSZnyACQK7Oe4DOyOSVYYOOSKx9TtFhsZdvBPAr2sPUcYKnIdRKykz44\/au1S91Ui1jkbYOoU1yf7NPgHVr7V0nljeK0VuM96991v4ZN4t8QubiMtGG\/OvYvAHw+tPDVmgSJUCj0r9dqcT08pydYHDfG1r5X\/U8901KXNLc6zwdoi2dnErDAAFeiWeqR2NsFjwSB1rzzUPEVvo8PLDj3rCtfiCl5dMkTZA6nNflGDWLq4j20G1fqehGatqetNemVuT8xqIztn\/ZNcfZeIxJg7ia2IdUMy4PWrxU6VBNQ+Ipu5pzOCPf0rKvIfMB6VdSQOuaclurt8xFfP+3nWqWZDON1LTmKk7PlrjtU07BJxXsl2LUQsG5+lchqNlBKx2A49xX3GBpOhUjKNQ4KkeaJ5Rd6akzHAw45rldbzZanpcmeVSU9enOPX39K9N1zSzESyDBHIrz3xGpuL+28xQDHA+fxcf4V+jPFP2ByR5TvfCuviWAITmuv060\/ta9gtoTh5XEY\/E1474euTbSlFJA6jNfVnwO8DNZ6YviHUYj5twP9GRhyqeuPf+VeTl+BxGd45YdL3d2+yPQg7o7mRE0nSVjKkpbxZGT044z+lYnh3SVCNqFwB5fVd3eujvrNLmNzORh3Bbb\/AB+i\/h3rI8RaosUcdpEAkaDLBeMAf4nFftuIpxpyVWe0VovM1uZcrT6jqFyqEJHH++kkbonPAx34\/wA4qhqGs6fZo4htUuH677gbsnscdP51VsdQkePUlXILlCOcDIrOtYnu3BYYGec8Y9a4cHjJXXs93f8AMxklJe8Rz+MLy7ky7OvTajHAxg46cd6LdZ7yUs4UkSKRx04Gc+vAFWpdLjt22w4eVXVjzgHnbzxz1rVRbXS2eS8mWPdhiNxJ4z2zx1FfZKM+W9WR5nvSZTs9NCLt9VIJ+o\/+vUfiMnfZzuBukhKlvcY\/xNWR4x0tQFhkGAerDviqniDUbTVNFndWQSQsJU2nv0I\/HNfO4x0qkJQpyTZ2U04xMyC8DHaa0bK+EOI2wB0UnjNcZaXrNITn0rTS9OSGJIP94f8A1q+Yi2tTRTOue7CLlm49+1Z9zqQjzISAD0FYU2oKikhD09cfzIrF13XvLt3bP3Rnp1H4e1dUW5sqU1E646nFpUY1GRVluZG8q2ibnJzjIHc56D2qxd3HjM209zFZ2zAr8ltLPtY+hbAIHPal+H3h7+0LmPVZsy28K7bMMc9QNz49c5H516BdyrFGV46V9DQnUpL3HZf1qelhsLCcOeqviPLNK+JUSsdO1e3Wy1XapkillypP8RVz19ug47ZxWf460m31LSp49ymwCFi+7IYknIJzz3yO5GD2qt8YvBsHiSwaWLdFdxfvI5YzhlI9DXGeAfG8d8P7E1ZLiR2lSKULkiHBxvJP8Lck8kjnrmvVwudRb9hX3PPzHBRoaw2kfL3j+a8+EPji01C1kGm6Xq7NvtG6eYACkz5Hc8HsMjABHy+v6b8Q08S\/D+4vrzbJ9iaSRnYDbloiME45JbA55z+FYv7W\/h1L\/TYpWgE0zajBJEdv3kzkIB2AQMcdya5K18K3MXwztrGLdEl3dCfyuT8iR7c575Yn8uK7quOpONrnylKjOE\/dPLdT0+48SaxFjnJz8vQV7r8MvCktjbIMsR8tY\/hDwMbedHkT5yc9K978H+HVjjT5P0r8+zrMIyXs6bPepJ8xVXTZEiwVOMVzuo6UXL5HWvYbjSAkBAUdK5PU9KwxOK\/Fs1xclNXPScNDyu70XaDxWHqWmhEzivTb\/T\/lPHFclrtoI4jWGGxTk1qc2q1OURgIwMc1SmWQS5kDYzSxXe25YHOM0\/VNSYRgJgZ6N6V+3ZFWlUoq\/QxqSuc5q8yzlkBwQcViyaAJV3umQfar9wWNxuA69a6TTVheHbIcAivsJTcFoGHpSrfEeZ6nYLbKR8q4rl7q7eJiAePSvRPG1ihRjAea4Q6ZLKORxXdSkpxuypwlRnynOX124JOCBTLHU5GkADsBWxqWjkj5OuKzrXRmVww4FaXVjq5eY6\/Ttc+zwJiTIrodP8cS2iEJIynHr0rzPVbj7LD+7PQVyU3iG7WUosmE9653RU9TpjGx7gfEdvqbOGfL9Tzya4nxJd20V0Bx1rktG1OVHJLkE8nmq+uXz3FwCScDrVxpcjM+X7R33hm8ii12xbIKCQE17J8VPEcVr4IEcLY3hTgHrXzX4c1QWlzE0rY2lSpU8iu68UeKDr1jHGGDnGAq14GLwXtKl2jNx97mPB\/F\/wBq1XUHkfcQTwtQWPhi5EG9oSFPPzV6jB4di8zzJYhn\/aWtebToJLPawHAr6KnUjTpKKWiNIxueKQ+H5biR\/kPFFeu6dokKh9qLg80V4tXOFGbjYD1fwp4WkYozqa9S0PRUgCccUumadFbqBtFblrtQ1+DY3GzrtnnNGvYRLGRgYrdtZdoFYNtKAa1LeTp718nWTe4jbjmq1BLz1rHifpmtC3avMnDQVzdtJeOKumUkVjQTYAq3HPgda82cNTVTLgXLVdhYD\/arLW4561at5ckZrCcXYpTNZM7emaqT3hTIyRV7Rikt+qSYKMa7u78D2d9ZBwgLY9K9fLMjxGaRnOg17vRvU6oPm1ueQzXR8wEZPzYz6VfktxewDjHHQ96oeJvDtzo2q+WuXif7oPYg12mg+HpJLNHYljj06USyvFOo6VOHvR38jqeiRydnpEVo24gZrP8AE\/iy20W3cFwCBVz4i3y+FbKSctsUg8kV85a54kufEtxKEdgmevrX0WVcJ47MaylWVod+h5tWtCMuR7lbxx8Rb3VNQMUTssQOGk4xW54J1chUy+R3rh9TsvssBJOc0nhvWDY3KIGUgnH3q\/dI8P4Sng1Qw8bNfieHVxPsat5SPorR79xswSc132kF5IkYg4rk\/hr4Zl1S3iuZ1Ij6gN3r1b+yorO2ICgYFfimd8Pxw6nOLPfoyk1zFWIhVyPvVHPclhjNVp7g5IBxUGZCSR81fmMcHWlH2vLoaTd2SzNwaoSHaSMVaEm\/GehqGeMYOOCP1rXC1ZYeopx3MTJvoRcQkFc1wOqaItxrc67flS3QdPVmP9K9JfEh21S0LQTrfiq5tI9oeUwpubovBOT+dfrmXVvrTp017zcuX8Gcco8xwnh3wNca54gstPtYmklnlVTgcKueSfoM19pxzW2nWsVsrqltaxiJAowOBiuE0W20nwe89lpgEtztAur7o3PQL6VT1zWprvZbQkoX4UL1A7n\/AD3xX7TlOX08npzqLWpPf5dP8zem+T3ToL3XzqF49wr\/ALiMGOPb90eprkNU1dnR5W6znjvhB0\/nRfym2gSyidRI4Abaeid8+9YGuXqo7gHCIu0be\/0z+NYZi5uLb\/p\/8MbKaJbaYeaJ9hd0YEbfQdjiuj1O+S2uC8cQSJkEwOOu7t+hrkLG7jSFFcyISMlWik4PfnAqj418Sra+Go3tpd8SkwsVzx\/FtOeRn+ledhqiwdFz+YOXMg8RfFHTtEmHnud75Cp36dgOprBm8S6r49uIzHG1hYp0C\/ff3PoPavMvCWl3HifXLi6vmaSdJSpDfwDqAB2HNfQ\/hTQorWCMBAMD0rz1mmKzJcjfLA7sLhINc8jM0v4eRzwgSb+eT8x5qlPZPoN\/c2kkhkHAjDHOEPNeu6faAIMAVyHxB0fN\/bXCg4dCpx7H\/wCvW0sNGhD2kNy8VTXJ7pydnbfvQFxyDmprqJoGGC2CP4TxVqCAxKCBjH92q9\/I2znIK9McVxzxcYQPKUDGur97ZHAZlP8AtLx+YIrE0HSbnx14ni0qJmWAfvLmUchI+M8nPJ6DJ6mnavBd384RFZ3Y7UXklia9s+GngeLwRouJMG\/uSJLiT37L9B\/jVZfi3i6vJHZbs6MPh\/bT974YnVWlvFpNjFbwoI44kEaIOigDArOv7kuTzirF9eLzzXOajf8AB5r3MXmNOjGyZ9HzKJka\/KrQuK8G1HOn+OxJFAZ4bmIxzIDjIznd+H9a9a17UchwTkelcDNYBrtriRdzk8Dvj0r8nx\/EL+sxdN\/Czx8bXU4chV+I2iy+JZdBnuLdkso4yVZurMDjH4Lj6ZqNdAS72FhkKAqr2UegrsbhJtT8LoHw7W0nmsOm3PAxWfa27ImR3r1q\/EFp87ekoxl\/XzPMhSUTKsvDMcUwIWu80K1W2UDGKyraIhgxFbNllcHFfJ4vP4N8ykbxjqbMyKycgGub1WxDMxA61s\/aj0YYqlfOJcn7or5fHZhDFRXLudCRxmo2QVSMda4HxWgjgcYFelaxKkcZOa8j8b6uERwADgV2ZYp1Jo5Z2seWa\/rK6ZO5LAHFY1v42ivz5RKEj+7XnHxf8XSQSuEcpk4G2uP8GeJGcj59xr+muG8DyYbnkefW5re6e93V6u3zMKR\/s0yDxQtuhRx1\/SsDTtSFxbDe3bpWT4iv0gh64Yd\/WvppU47MvB+1pvmNnWddW5cBWz+NZz3qW9uWdgvcjNeb3nixILgp5mD+tUb\/AMUvcx43EKffrW0KXKelP3vekdndeIoi5+YHJrOufFMUR6jBrgp792BbfXOz6jK91tLttFdKp8xmnyyPQdd8SJNEVTvXFvflZTk1SutQZISSeDWQb4MDk9K1jT0NXPmOrs9f8qdQTkE4NaOp6n+6DqQa85lvCGODyK2rfVTPZgE8gU5U7K5Vz3DwP8P28YaYclouMiRe1dR4U8Cz+H7ucX+JQjYEmK4H4IfHO28ISnS9ZiL2zH93OvUe1dl8Qvilb3KkafKrpKPlZT2ryKlOo58ltDWPJYz\/ABnr6LqMsFsFO3glRXDJ4hllvREzNz\/CKsw3kMGmyyyP5s8n8Tdaz\/DelNfakJ2BILYFZV5KlRfMYSlZHqvhbS3uLMyFeTRXf+C9C8vTE+XqM0V+Q4nMLVZI5+c9KWcZ9KtQ3PzYzXOreZPBq7b3HIOa+QnS0OWUzqLWbIHNasEvFctbXOMc1qW1zwDnpXlVaRnc6WCXpmtCGcDFc3Dc9q0Ip+OteZUpDTN6O4yKsRznHWsOKfpzVyCfJ61xSp2KubMc2Tyeavwtu5zWXCnmL15rSsbaQvjIx2rz6iSRcU3ojX02cxXcLdgQa9k0y7\/0FTntXjAiMOCRnmvSPDl60mmRA9dor7rgyu4YmrReiaT+5\/8ABO2mrXbKXiWyS+u4yBkk810+h6eo0\/BHaqltp\/2m6DEZrq7aySG22seD1wcV+v4bL4zqOs0dDf2TwL45aHFrWky2Yzvc\/JgZw3b86+f9H+FdzBc5KtEc19V\/FddOkjgs7CHz7t2JmkWQnyx2x79fpWHofhSXy41bLleN7ckisq2ZTwcnhqSueZisPSrTjUfxRPJ9M+BsergC43Ed66\/Qv2WdGjuY7pomLocgN617TomgR2oQt2rq0kit4sDbxXfhcRXqL3nYqGDpS+KJ54uixeF7EcARoMCuJ1zxdc3kpigUiNf1ruvHt\/H9nbMgQf3c9a8xTyChcuDzXmYvKljE1N+6bzVpWRbs9QkkQlyc1o2eqJBKCx471ixSKzoF4B6VYntnDArkmvjMfl3sY81NfCYXZu3k8Mi74zmNvTtWc7sw9qgto2KgHNWJNqDDECvx\/MJxqYhuJb1+Iqhtj5zVHTb6Wy1y6niYo4YEFfpircpycg5rGl\/dy3EpOD1HvXfl2NqYWcXF6Rdzjqboh1r4hy+DrmQys1yLhjIFXkr\/ALwpfCvxx0K8SeSa7MN1u8tUnBAQDkbfTuec1xfia3M\/mOw3yyDH0HpXQ+Cvh9bW\/wANNWvZNqXtzM4RnA52gZUe2ePwr9k4fzfFYqbhzaJX16GEZTbtE7iXxnYG1e5gmSQkZWfdncfr0zVDS\/ElpqF1seUgR\/M4bPXPtz6flXyzqHgrWNQ8RvHo2oPpcLgSOqMdmPdehOau3XiPxN4FuwkV5Febl8tpGTaT36fhX1tfHS5bzgOlV5vePrGbW7SJGAuwcdB8+P51yureK7TULe\/jkne4CALsU4w3UEcD1rwaPx3r+qqgGpIjsMnyeSPzzWrotpf73Jv2Jc+YTK3JevErZtzLljDQ6eZnqXgrw++la61z5iNBdgfLggqeo\/nXu2j2gEYwBXzd4c1\/UWvEEoiLq38GQDX0z4bkF1ZwTL0dQfpXPltejWqS9ietg63uOnI3raPFZ3imyFzYA4yY2B6fh\/WtqFRgYpby2E1rIh7jFfW1IXptHXOXMmecCx2ptrMv7UKCCMCuultcEgiix0BLqUTTjMSnhG\/iP+FfG1qMpy5InmKPM+WJl+CvCkcEg1W4Tkf6hG7f7X+FdRe6gIxjNR39\/wCSu0cVzt7fkEkmlWxVLL6Ps6fz9T1YSjRhyxJ77UMg4NcxqmpEsVU5NR6hqhO4BsY71hyTeY5Havy3Ms8qYluNN\/M4q1dRIrrdK2c5GeT61W8gN1FXsCmeUM+tfLc76nmOTk7k2nyC2glj6iUEN+VVooijZ71Ki44x1qdIs1pPE1JQjBvRbGvM2tB9uo3LxyavxYA6VUUhD0p\/n4FefO8jaMiaSTbzmqFzcZBOaLi7wMVi6heMQVBralScmDqW0RheKNR2q+DXhvjvVCUlAJJr07xZeCGFyW\/WvCPGmsqHYjOOlfp\/D2AnWqKMUczklueFfETS21Z3JBz2rl\/DWjT2Mwby23D9a9qGm22qEShN2a0rXwgkrApEOfav6DpYqGAoKmKcor3jg7Ke7jGdjf7tZXil9QuLcskRIxya9wsPAHmjLJhfpTtS+HsfkOgC7iPu150uIMNTl70hxqSPjySC4a6YurDn0q\/IypBzkGvctb+HQjZisY\/KvOPE3gtxG4EZB9q9vDZvhcS1GMglWlynm97quNyKQKyReAuSTzWjq2gT2spyjH3rJktGTsa+mg4tXRnCavcZd3BYYBqqOvNSOpyc5OKadiD\/ABrRHXFkLgk961tEAMmxjw3SqAINSQzeUcgbSDkNSkrqxonzG1f6XvGY\/vVRS6vbJwkpfy+wNdBot+kpSVxkZ+avf\/CPwx0Dxv4bM6tHN8uTsPzKa8+db2WkjVnz9p19LqdzBEWYRDr717T4P02PzYAqjAxXNv8ACS48M6zcAMZrBTlGI5Ar0jwdoNxaWdtczKEExyi98V8fnuKgo8sWc9V6Hrnh6IJp6iil0bKWoGKK\/Gqj99nFzGXDeYPJrTtr\/GOcZrio9R565q3b6gc9a9KphrnLzHeQX4xnNalrd7iOc1wdpqBLAA10um3G5Rz1ryK+H5UNM7OzmyAe9akLHPesPTTvx79q6S1tztHFfN17RZ0qNhk1wIhjNXdMlMuG7VXn04yitPw\/pczyiIIxA5B\/pXHKzhpuDjfRG7YQkgcGtmynW3uYC52IGyau6foQSAFhliOlZWuwLZqMDBNYSy\/E0orEyVkrM6Ixtqy1d3\/2q9nZPljLHAFdd4Z8QwJBHE7gPkrtrzvTSZIhk8miaMxalbuGKgNnrW+U42eGzFVVvJ2fzZ10mfROktHMBIuOeam1e7UQFSe1cf4d1pYLJNzYwP4qyfFXjJERwrrxX75LGJUrI0ceVl0JDPe7uCc9a6ext4oItzYFeKWvxCgtn3tJufPCr3rkPij+07YeEdCnlNyonUDbGG5bPpXPhVzy92N2zmuo\/EfRGu+KrHRbaW4ubhYoohlm9K85t\/jxpeu2t42mXCXElrJ5UoVvunGR+dfIOi\/tC6p4v1FI9RuAlhdS+U6XBHlLGRgSdOnIB\/OuM0HSdc+C3xBufEumWt3f+CrucxahZqzs1sD\/ABMO+05w\/wDvDvX0FLBtP947MJt8nNT3PsDUvE13rVyZJpmC9kU8VFFGrnO4jNP0Swstf0u01LTp1u7K6jWWGVOjoelbFv4XlkA3AgenrWk6lOjH3jylCrN80iLSLQvL8rF\/eupS3AjVSd3qadpnh+SKIcBQKsyQJZhmYlmB61+McWZ8qSVLDr4j16NK+5WkVIUyqfNVG5QuBkYas7WPFwsmKKm7FVdN8Qi\/cAkKSfu+lfEZdlccRD6xXe\/l\/kc1arG\/LE0EB3YwTzjArKuACW6EE\/nW\/wAyW1yyKzOiglVHIHrXPWp89ZgOSFzXLicE8G1re\/8AnY5ZvVJGRd6W9zvnICwxMNzH17AeprntT1+60S7UpPKbdRtNsxyhH07H3FdhcSmRI4s74VOQinGc1sJ8M9I1jTnS7kkN43SRWwI\/oO\/419Lk0K9aolhtHHW\/6f18zFQlL4DxO41iJ9QS4gXBB5GeqHt+B\/8AZq5\/4mSJc2tq1qGeZmLPtH3Ux3+ua9BvPhxq+h+IINIlsIL6wvJdsVzLlVT1YOOVOOo710mrfAUaJvvhcJqsBHKXD+Uy+wGQD+ea\/WMJKtiaVpx1W\/kRTpTvI+WreKaObzBnk9uorv8Aw1f3atGRcSn\/AHmJH6102reGNG88puexn\/uMmR+v9DUemaTaw3gjEsTgHkx7h+leLmGElCN6cjpUeX4j1\/wN4YGoabFqM4zcSH5RjAI+le0+FoPstqkBAG3kBfeuL+HIGq2aIkIS3t1ALDp9K7jT5w98uw5jBxuHevawGEp0YQnHd\/j3PQpPl96J0kAqRx8pp1smakkQIvNfRte6dcpGFPaB5TkfJ1NQXVwY1wMKKv3bnmsC\/faG5r5rF\/u02jFS5TM1K\/VAcnbXI6pqvmOdrcfzq1r1zyRmuVuZizHnNfjGd46des6EdluY1a0oq4+e7LseaiWbaOKql+aeOgr5vkSVjzJTkXVn9zT1l\/Gs7zNpqVJff8alwKjM0VbdUivgVSWT3qWNiTzWLiaRZeDDb1qOViAfeo0O080k7jZms1HU6IspzsGODWfqV3Fp1qXfBbGadeTbSecYrjPFUs1zEyCVgPavpcqilWWl30NIvQ878feJ\/NlkQNgdhXhniHWXuboxMSRmvQPHUbWKyMmSW\/WvJ4bK5vL7fKzKSc4r+jcgy6OGw\/1iR5c6vv8AKdn4U0\/zym3coP8ADXreg+HV2plc\/wDAa4fwTaIixo3LV7X4asQUTjmviuIM3nSk4wZ0UocxLY+G45FHyLzUt54QR0P7sflXc6XpiqoOK05tOUpggV+R1czqSqczZ28mh4JrXgfIfC5rzbxH4AZg\/wAm78K+p9R0dGByBmuQ1nw8kwOFr6DA51ODWpyyifGviH4aM7kiPH4VxOr\/AA2eOJyIsHHpX2VrPhFSr5QE\/SvOfEHhkIXRo\/lPpX6flvE1XSNyN9z4q1vw\/LYXLqVNY\/8AZczvjBBJr6U8UeA1kZ5DEzZ715fq2g\/2fcn93kDtiv1jL8zhi4rUPaNRuji7fRAqfMCWrUt\/Bcs9t55VlGMha2LSyllK7UO3PPFdwjiz0UqIw8zDAFelXqONuU0w1VT1keMCc6ZemLqp4x6V3Hw68R6z4U1qC806dxEzjzIM5Vh34qpZ+AbnUtRM0qscnPyivUNB8G+QkeLYjHdlxiuTE4iEKdma+05meu+Ip7bxDpFmIFWN7hdzbeq5612utaFZWfhjw1DaLwkR3P3Yj1rzKxElrBEhY5U4HtXp97eJcwWcSkOkUQAx6mvxPNsTKdXyLlLQrW8flwgUUhyqjrRXzerPPPGYtS561o2uoFz161xVveEsOa3NOn3EV99VoKKMIncaXNlhXX6XNyOa4LSrgcc11ulzjIOa+XxdPc0iej6FJudPeu5sIgyCvPfDOWZDXo2lQtMyAdDXwGP92R30k2rs2tO043ThVHXpXe6P4fS0iBCgMOaz\/D+npbRByMN610TXyxJjOK97JssdJ\/Wa+72R1e6QXxFvCSByBwteffETX5bJLKB4ka5IzNIrfKi54X\/exjP\/AOuuj1vXANyxnLDuO1clNo0PiWSJdXuzBbxnO2E4d\/qe1ezDHZfjpywFWXLd2uYzTS0K2j6sJFGDkn0rWkkE9xBk5wc1qC50DQrLyoTZWECDmW5lBY\/hXJN468LXF3Ilhqn22eHh\/Igbap+rYrwcZwtisNP2+H9+K12HRlaVmemJpGq6lYkWMJkO07cOBzj3NcJf\/DX4iyW0slzZWkWTlUN6pbHuBx+tamkfFWPRoxiOW4OMiMSbM\/oataR8b5\/E2rpZN4dkgQn5plv94RR1YgoPy71+jZdiMFWw7qSlrBa3O2M\/3mh4R4t8G\/EPQLe7u08KajfwKCSbErcsvuAhJ\/Svl\/xLd3PiO\/mOpuRcx8f6UuwxndnZIpxg\/XkV9965+1z4C+Gviu80TVbbV0ubfbve3gWWIkqGwPnByAfSsTxN8XPgL+0UI4NY0aZ5pBhL+4sZLacY6YmTP5NxX0+GrQo0frSj7jV7rt\/XoYT3PjTwZ4fnv7u8FjFKJd\/mLC6D5U4Bwp6g5OR6V9TeHtP1K20b+zoIfLt5o\/Jl+YOXXsckZBGePUda1NO+FHhfQ7qEeH9RlvrFTlBdhTIo9N69fxAr0XSrCC2VAIxx7V+X57xtOFSVPCx+YoXbsiD4T+E4PCFs9tAWjtJ281reQ5Ecp++V9AfTpXot21vuTGDt\/u1hW0G0BgeKbcX8dvhdwz6V+dVOK8zxMfY3u2zeKitDbikMxAJ2qKp6reW0MZVgC1Q2spu7cvEwKHoQa5XXlnEhDyLX3+UZLGNKNfGLmk+5nUk4r3Ruow2l4xJVaxUsYLW43DKCpbeGZm7cVbis98nz9D1r28XKmoKCR5Mk5PmINa1WXS7e3vbaTP3oHPqGHf8AEVj6TdvK4CuVY9K3PEGlFtDudhDpGBJ+RrlLAGMgdq\/N81jeo2+uvl2dvmjBqSaNSYlSRg5X9Kt23iC5t+QxDr2P8VUZ2aVgzHLEYz61QuMqe\/FeVh6k6MlOnKz8idYvQ6ef4vz2CGCWyjuQw\/i5H5d65DxB8U2mmAi3SMOdrEiNPYL2\/CszWHDxgRlg\/c+n0rn00K51S8SC0iee4mPyqvU9+tfeYXPMbOMYSlc0jVnN2udLpWtT+L5J4b8QWmmhCGMUeXJPQKTnH1re0T4faFJcxxWkty8rsFTEgPP5Vx9zqOo+D7eaKKG13SNvePzFc5xjJANdl8K\/EMuj6dd+KtahhTDeRp9siBTM\/c+uOv4A+or7nDVKeMSjV3+15HbG32j3C1tIvCui2+g2TA3bL5lxL3UH19zWxoNk7skaDe\/+z0Fea+DdWu9WuJLucmeWV\/NkJGck\/wBK9q8Msi2S+XGsZfljXp4dxxE046JaJeR00l7Q1BiMbR8xHU1VnuN2RUlzKqpgf\/rqm7Dbmu+tO2iNZsq3jjDVzGrz4U1uX0q4Ncdrl5hW56V8LnGKjSpSbkcspHK63cF3YDrWK0eeWOauXcgeYk84qts3Gvw2pVdWcqj6nJL32QGNc5xSkHOKvW1n5mRjpUVzAYpGX8qVnbma0CdFqHOylL90juKqrdbWxV5o\/m6dayLwC3vinZ+RW1NKWhyvmNSFywzWpCPLQA\/fI\/KsWK6Fu+Bh2HT0FaNrN5hyxyScmuepFmkEW\/4abL0GelSryPrTJIywwoya5k9TtiYWpEk8ZzXH6pGWL5zXpcHhubUGycRqe7VuaZ4F0YsElP2iX6V9BleIpxrJc2qGoNq7Pjzxzo73TkbTwf4u1cGfDi28nmO+xa+0fjh4F0q10SCW1tRBKp6juK+a9b0FGU8HP92v33KMzdenKkpaHl1afsp+8YnguYNchV5CtXvfhZ1KoCQK8Z0DRlsbjzTlQe+K9P8AD98ECYPA96\/PeI8NP2jl07nfRaWqPXdPePYASCa0gVYc1x2l6kHUYPT3rag1AE8mvyirRkpHY6ie5ZurUOtYd5pwIPFbjXalfas66nVgadJziYT5TjtU08EkEVxus+GxcDIUkntivRrxBISay3gyzBc7x2r6TDYiVPVGUdWeXXXw8JheSaICPHSuD8TfCSGe3eeOKM452tXvGt3LtYSQqFL\/AN5jyK8tvdWuIfNglwYiflPpX6Vk2bSptJGU4qGh55F8PbDTNPd5bVZCFz1xivOp9MVtRdM\/IDwu6vXtS89rGWON96E52sf5V5lqMH2W5JkjKHOTk1+v4TGe2hzNkRlc6DRrGOCNArKACCxzjFeqaRbRQafubY7yD5eOteHpfxMgBY16F8N4r3X7aZYGl8iDn5\/6GvKzCpyQc2ztUuUuX2kTFzdlhsDdFrfsUSK3R35x0HrUF9cC1aS2kUhl4Kms1NRzgZ4FfmNVyrmNSSsadzqG18ZormdS1Tynxu70VccK2k7GVjxGxnZznOMEr79Dnn8K6bTieKKK++xSVjlSstDo9NuC4jOO2cGur0qcjYOeQxJJ9KKK+UxSWpTSuj03wjN5kKHBypA6+2P617D4YizEsuQMZOMc9PWiivhZU4zxPvLb\/NHo0tVc7aC5ZIl4BrndX1+4ZzGoCqcZGaKKwzPEVVampaNfpH59WbPYyra9e6Bzxgcc59aivgJBCx65Iz6UUV8qvdnoOb\/dpnAfGnxE2jeEJLiKBXcBhhmxnB29vfn9K8P+C\/iC4vNVnaUlmncE84A69vwoor+ocrSrZG6s\/i5V+nY4HJ\/Wdz6NgsVu53847iFwCvBFdRoGj\/2RZB45i8ksxRmYfwr269880UV+I4PFVcR7WhVacWr2st7rsj1sPpWPlP8Aas0OGDxXb6sGPm3U4hlQcAnnD+xGB064rd+DOiQFBnkn5iSMg9+n40UV+i59UlRyuFGm7Rtt6bIwk7tn034ftYxbxhRt525PP4\/pXVWMYESy+4Ugd+P89KKK\/nDFNuTOqKVy1cXjQxnaMcZ\/+tXnXjrVJ006SaJjFIo4YGiivRyOjTq4hKauDd4nOfAP4lanrz3VpehZYopliHOCck4P4frXqmpgXEp7c59aKK\/dYSbg4t6aL5dvQiDfsyiD9nOep27hjj2\/pTPtzF3QqPrRRXz+YycaUWnv\/wAA45FbVLl0024hb5gV4OTx0rnrRBtU+xP6UUV+cTqSqQjOT1aRySWxohY0dFdWYH+6wGPzBqvdz2y3EEItAftEvlb2kJZT0z2H6UUUsM\/fSfUlJGBrOni11CW2D5KOFDgY5PfGf5fmK1o\/DkMfgafVBIwu5NgRhx5ak8j3zRRX1uApQftm18K08un9dt1qRRS1OD1OzFlpcl2p3SB0Xkdi5U47dF9O\/tXT6CiePvH0OlzB7LS9OgCw20L8dRkk+pOCfUADtRRX2WU6uNL7MuW\/nozrpo+i\/h7o9pa68IbeLyooIGkKElg7AgDOfTP+ea9E1GUxy4UKuRg4HWiivt4+7QfLpqexSS5DLmmYnrSSuVQYNFFebJto5pfEYmpTHY3FcJrszEnJ70UV+VcTyfsmr\/1c5am5zch3ynNPiUYzRRX5m9hUVeWpZhyj8E02+csVJ5OKKK+wp0KbwE9Op6aSsZ+fmrH8T\/IlvIPvB2XPtj\/61FFfN0P4q\/roeGvhmYVhqEkkvzc11GnSszAE9aKK7MXFLY56ZtwEsOavQHjPf1oor5+od8NyxbSux2liRWrZSGOQMuARRRXNP3ZXR002cR8RryTWbxIJiREvRQa8j8QaPBA2VH50UV\/QmQK1JWPKxavU1MaKwju0IPy45HHer\/h07XZeoHrRRX1GPo06lN8yuKjpqjqra4e1lUA5Fb1rdsaKK\/EMzpQp1Woqx2Mum4KJkCq73DE80UV4cUjMrSMSrVm3EzQyrIpwwOQaKK7KSGtyl4pmS7hS4ESxOyfNt6N9a8r1tFdHJAz7UUV9NlpdfWR59qVy8ZZOGU9jXnOvGSfUNgk2D6ZNFFfq+VzlFpJmNFXZSl0hoZQHuWcEYwF219cfB6ztbfwP50VskcjhQSv0oorg4tqShhYOL6m\/U474iRKkkso4fOa4S2vXMee+MUUV4uX64ZXMpHP6zfyG7I9KKKK+opxjyLQR\/9k=&quot;&gt;&lt;br&gt;",
      "created": ISODate("2013-12-08T07:40:03.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2014-02-03T08:18:02.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52a5a6e8471dee8009000000"),
      "author": "Quang Thi",
      "content": "        fjldsajflsajdkf &lt;u&gt;Edited&lt;\/u&gt;",
      "created": ISODate("2013-12-09T11:18:00.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000",
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2014-02-03T08:18:05.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52a5a7a0471dee8009000001"),
      "author": "Quang Thi",
      "content": "99999999999",
      "created": ISODate("2013-12-09T11:21:04.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5f43471deeb40900001f"
      ],
      "status": true,
      "updated": ISODate("2014-02-03T08:18:05.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52a5abdb471dee7c09000000"),
      "author": "Quang Thi",
      "content": "fjlkdasjfklsdaj",
      "created": ISODate("2013-12-09T11:39:07.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "status": true,
      "updated": ISODate("2013-12-09T11:39:15.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52a5ac06471dee8009000002"),
      "author": "Quang Thi",
      "content": " Nhà đầu tư nên tạm dừng việc giải ngân và chờ đợi thị trường cân bằng hơn cùng sự cải thiện của thanh khoản.\nNếu thị trường tiếp tục phá vỡ ngưỡng hỗ trợ 488-490,việc xem xét giảm tỷ lệ cổ phiếu là cần thiết.",
      "created": ISODate("2013-12-09T11:39:50.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-12-09T11:39:50.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52b5662b471deec80c000003"),
      "author": "Quang Thi",
      "content": "&lt;a href=&quot;http:\/\/localhost\/yesocl\/wall-page\/user2\/&quot; class=&quot;wall-link&quot; data-ref=&quot;user2&quot; data-content-syntax=&quot;@[user2](contact:user2)&quot;&gt;user2&lt;\/a&gt;: hello",
      "created": ISODate("2013-12-21T09:58:03.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-12-21T09:58:04.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52b566e5471deecc0c00000b"),
      "author": "Quang Thi",
      "content": "&lt;a href=&quot;http:\/\/localhost\/yesocl\/wall-page\/user2\/&quot; class=&quot;wall-link&quot; data-ref=&quot;user2&quot; data-content-syntax=&quot;@[user2](contact:user2)&quot;&gt;user2&lt;\/a&gt;: hello",
      "created": ISODate("2013-12-21T10:01:09.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2013-12-21T10:01:10.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52f9dd7c471deef40a000002"),
      "author": "Quang Thi",
      "content": "d afdsa fdas fdsa",
      "created": ISODate("2014-02-11T08:21:16.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "status": true,
      "updated": ISODate("2014-02-11T08:21:16.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "content": "&lt;p&gt;\r\n\t&lt;strong&gt;Review quan điềm tuần trước&lt;\/strong&gt;:&amp;nbsp;&amp;nbsp;Chúng tôi cho rằng nhịp tăng nhẹ có thể sẽ tiếp&amp;nbsp;tục trong phiên đầu tuần với khối lượng duy trì ở mức trung bình. Vùng kháng cự của nhịp hồi ngắn này là 495 – 497 trên chỉ số VNIndex và 61.5 trên chỉ số HNXIndex. Do đó, nhà đầu tư có thể tận dụng nhịp hồi sắp tới của thị trường để hạ tỉ trọng cổ phiếu xuống mức thấp và chờ tín hiệu xác nhận điểm giải ngân của chúng tôi.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tChúng tôi vẫn bảo lưu quan điểm trong nhận định trước đó và cho rằng sự tăng điểm trong tuần vừa qua chỉ là phản ứng mang tính kĩ thuật của thị trường trong ngắn hạn. Khả năng các phiên đầu tuần thị trường sẽ gặp&amp;nbsp;áp lực bán mạnh do tâm lý nhà đầu tư vẫn ở mức thận trọng cũng như dòng tiền lớn đứng ngoài. Tuy nhiên,&amp;nbsp;trạng thái mua bán chỉ xuất hiện khi có sự bứt phá hoặc giảm điểm rõ rệt, nếu không thì&amp;nbsp;thị trường vẫn chỉ giao dịch trong trạng thái tích lũy biên độ hẹp và khối lượng giao dịch&amp;nbsp; thấp.&amp;nbsp;Vị thế mua chỉ bắt đầu khi VNIndex phá vỡ ngưỡng cản 495 – 497 , và khối lượng giao dịch cải thiện trên 40 triệu\/phiên, ngược lại, nếu phá ngưỡng 488-490, Vnindex sẽ tiếp tục giảm về vùng 470.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm kĩ thuật trung hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tĐồ thị tuần, Vnindex vẫn đang trong trạng thái trung tín, và đang có xu hướng giảm về vùng hỗ trợ trung hạn 466-470. Chúng tôi tiếp tục giữ quan điểm thận trong như trong các khuyến nghĩ trước, nếu ngưỡng hỗ trợ này bị phá vỡ thì xác suất hình thành mẫu hình vai đầu vai ở đỉnh sẽ khá cao. Do đó, nhà đầu tư trung hạn nên dừng trạng thái mua trong giai đoạn này và chờ đợi xu hướng rõ ràng hơn.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Chiến lược giao dịch ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;ul&gt;\r\n\t&lt;li&gt;\r\n\t\tNhà đầu tư nên tạm dừng việc giải ngân và chờ đợi thị trường cân bằng hơn cùng sự cải thiện của thanh khoản.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tNếu thị trường tiếp tục phá vỡ ngưỡng hỗ trợ 488-490,việc xem xét giảm tỷ lệ cổ phiếu là cần thiết.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tĐối với nhà đầu tư chấp nhận rủi ro cao, có thể giải ngân khi thị trường xuất hiện nhịp điều chỉnh đầu tuần.&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n",
  "countViewer": NumberInt(25),
  "created": ISODate("2013-08-23T16:51:28.0Z"),
  "deleted": false,
  "description": "Review quan điềm tuần trước:  Chúng tôi cho rằng nhịp tăng nhẹ có thể sẽ tiếp tục trong phiên đầu tuần với khối lượng duy trì ở mức trung bình. Vùng kháng [...]",
  "email": "quangthi_90@yahoo.com.vn",
  "likerIds": [
    "518f5555471deea409000000",
    "518f5f43471deeb40900001f"
  ],
  "slug": "lang-kinh-yestoc-tuan-05-0908-cho-doi-xu-huong-ro-rang-52179310471deec003000000",
  "status": true,
  "thumb": "data\/catalog\/branch\/51d39ba5d87459c40a000017\/post\/52179310471deec003000001\/avatar.jpg",
  "title": "Lăng kính Yestoc tuần 05-09\/08: “chờ đợi xu hướng rõ ràng”",
  "updated": ISODate("2014-02-11T08:21:16.0Z"),
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});

/** cache_post records **/
db.getCollection("cache_post").insert({
  "_id": ObjectId("521a4280471deed809000007"),
  "created": ISODate("2013-11-09T06:38:46.0Z"),
  "view": NumberInt(0),
  "postId": "5216d23b471dee600b000001",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("521a4fba471deeb809000011"),
  "created": ISODate("2013-11-11T17:21:43.0Z"),
  "view": NumberInt(0),
  "postId": "5216d154471dee800a000001",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("521c4ab6471dee200b000001"),
  "created": ISODate("2013-11-24T13:22:07.0Z"),
  "view": NumberInt(0),
  "postId": "5216d1f7471dee840a000003",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("521c4b6b471dee200b000004"),
  "created": ISODate("2014-02-09T13:41:24.0Z"),
  "view": NumberInt(0),
  "postId": "5217929f471dee3c08000001",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("521c4b78471dee200b000006"),
  "created": ISODate("2013-12-08T06:55:50.0Z"),
  "view": NumberInt(0),
  "postId": "5216d192471dee840a000001",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("521e0893471dee8c09000001"),
  "created": ISODate("2013-11-26T05:37:46.0Z"),
  "view": NumberInt(0),
  "postId": "521792d9471deeb408000003",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("521f2aec471dee200a000002"),
  "created": ISODate("2013-11-24T14:04:26.0Z"),
  "view": NumberInt(0),
  "postId": "5216d281471dee840a000005",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("521f8b51471dee5c11000005"),
  "created": ISODate("2013-11-09T06:59:17.0Z"),
  "view": NumberInt(0),
  "postId": "5216d059471dee740b000001",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52486249471dee740b000001"),
  "created": ISODate("2014-02-11T08:21:16.0Z"),
  "view": NumberInt(0),
  "postId": "52179310471deec003000001",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("526bec37471dee000b000003"),
  "created": ISODate("2013-10-31T01:45:57.0Z"),
  "view": NumberInt(0),
  "postId": "526bec37471dee000b000002",
  "type": "User",
  "typeId": "525bd847471deea808000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("526beccd471dee140b000005"),
  "created": ISODate("2013-10-26T16:28:57.0Z"),
  "view": NumberInt(0),
  "postId": "526beccd471dee140b000004",
  "type": "User",
  "typeId": "518f5f43471deeb40900001f"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("5270c46c471dee0c0a000002"),
  "created": ISODate("2013-10-30T08:33:47.0Z"),
  "view": NumberInt(0),
  "postId": "5270c46b471dee0c0a000001",
  "type": "User",
  "typeId": "525bd847471deea808000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("5270c6c3471dee1809000002"),
  "created": ISODate("2013-10-30T08:43:47.0Z"),
  "view": NumberInt(0),
  "postId": "5270c6c3471dee1809000001",
  "type": "User",
  "typeId": "525bd847471deea808000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("5271b613471deedc0a000002"),
  "created": ISODate("2013-10-31T01:44:51.0Z"),
  "view": NumberInt(0),
  "postId": "5271b613471deedc0a000001",
  "type": "User",
  "typeId": "525bd847471deea808000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("5271b632471deeec0a000002"),
  "created": ISODate("2013-10-31T01:45:21.0Z"),
  "view": NumberInt(0),
  "postId": "5271b631471deeec0a000001",
  "type": "User",
  "typeId": "525bd847471deea808000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("5275af3e471dee940b000007"),
  "created": ISODate("2013-11-03T08:33:37.0Z"),
  "view": NumberInt(0),
  "postId": "5275af3e471dee940b000006",
  "type": "User",
  "typeId": "525bd847471deea808000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("527dd9e9471deee40b00000f"),
  "created": ISODate("2013-11-09T06:48:05.0Z"),
  "view": NumberInt(0),
  "postId": "5216d0e6471dee700b000001",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("527f51d4471dee440b000001"),
  "created": ISODate("2013-12-10T13:03:28.0Z"),
  "view": NumberInt(0),
  "postId": "52179237471deeb408000001",
  "type": "Branch",
  "typeId": "51d39ba5d87459c40a000017"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("528e3a4c471dee880a000002"),
  "created": ISODate("2013-11-21T16:52:28.0Z"),
  "view": NumberInt(0),
  "postId": "528e3a4c471dee880a000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("528e43e5471deecc0a00000d"),
  "created": ISODate("2013-11-21T18:05:36.0Z"),
  "view": NumberInt(0),
  "postId": "528e43e5471deecc0a00000c",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("528e47e2471dee880a000005"),
  "created": ISODate("2013-11-27T15:50:48.0Z"),
  "view": NumberInt(0),
  "postId": "528e47e2471dee880a000004",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("528edaa8471dee100b000002"),
  "created": ISODate("2013-11-22T04:16:40.0Z"),
  "view": NumberInt(0),
  "postId": "528edaa8471dee100b000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("529aee4d471deeb00a000002"),
  "created": ISODate("2013-12-01T08:07:41.0Z"),
  "view": NumberInt(0),
  "postId": "529aee4d471deeb00a000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("529aee7d471deeb00a000005"),
  "created": ISODate("2013-12-01T08:08:29.0Z"),
  "view": NumberInt(0),
  "postId": "529aee7d471deeb00a000004",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("529aeed7471deeb00a000008"),
  "created": ISODate("2013-12-01T08:09:58.0Z"),
  "view": NumberInt(0),
  "postId": "529aeed6471deeb00a000007",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("529aef4f471dee200a000003"),
  "created": ISODate("2013-12-01T08:11:59.0Z"),
  "view": NumberInt(0),
  "postId": "529aef4f471dee200a000002",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("529af075471dee200a000006"),
  "created": ISODate("2013-12-01T08:16:53.0Z"),
  "view": NumberInt(0),
  "postId": "529af075471dee200a000005",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("529af540471dee440a000002"),
  "created": ISODate("2013-12-01T08:37:20.0Z"),
  "view": NumberInt(0),
  "postId": "529af540471dee440a000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("529af5f1471dee440a000005"),
  "created": ISODate("2013-12-01T08:40:17.0Z"),
  "view": NumberInt(0),
  "postId": "529af5f1471dee440a000004",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("529af65a471dee440a000008"),
  "created": ISODate("2013-12-01T08:42:02.0Z"),
  "view": NumberInt(0),
  "postId": "529af65a471dee440a000007",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("529afa82471deed009000002"),
  "created": ISODate("2013-12-01T08:59:46.0Z"),
  "view": NumberInt(0),
  "postId": "529afa82471deed009000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("529afbb1471deed009000005"),
  "created": ISODate("2013-12-01T09:04:49.0Z"),
  "view": NumberInt(0),
  "postId": "529afbb1471deed009000004",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52a419a6471dee580b000002"),
  "created": ISODate("2013-12-08T07:03:02.0Z"),
  "view": NumberInt(0),
  "postId": "52a419a6471dee580b000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52a419fa471deee40a000002"),
  "created": ISODate("2013-12-08T07:04:34.0Z"),
  "view": NumberInt(0),
  "postId": "52a419fa471deee40a000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52a74aa7471dee240a000005"),
  "created": ISODate("2013-12-10T17:08:55.0Z"),
  "view": NumberInt(0),
  "postId": "52a7184c471deef409000003",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52a74ac2471dee240a000008"),
  "created": ISODate("2013-12-10T17:09:22.0Z"),
  "view": NumberInt(0),
  "postId": "52a74ac2471dee240a000007",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52a94fae471dee8009000002"),
  "created": ISODate("2013-12-12T05:54:54.0Z"),
  "view": NumberInt(0),
  "postId": "52a94fae471dee8009000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52a94fde471dee8009000005"),
  "created": ISODate("2013-12-12T05:55:42.0Z"),
  "view": NumberInt(0),
  "postId": "52a94fde471dee8009000004",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52a9568c471dee9c09000002"),
  "created": ISODate("2013-12-12T06:24:12.0Z"),
  "view": NumberInt(0),
  "postId": "52a9568c471dee9c09000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52a957fa471dee9c09000005"),
  "created": ISODate("2013-12-12T06:30:18.0Z"),
  "view": NumberInt(0),
  "postId": "52a957fa471dee9c09000004",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52a9582a471dee9c09000008"),
  "created": ISODate("2013-12-12T06:31:06.0Z"),
  "view": NumberInt(0),
  "postId": "52a9582a471dee9c09000007",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52a95860471dee9c0900000b"),
  "created": ISODate("2013-12-12T06:32:00.0Z"),
  "view": NumberInt(0),
  "postId": "52a95860471dee9c0900000a",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52a95886471dee9c0900000e"),
  "created": ISODate("2013-12-12T06:32:38.0Z"),
  "view": NumberInt(0),
  "postId": "52a95886471dee9c0900000d",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52a95e24471dee9c09000011"),
  "created": ISODate("2013-12-12T06:56:36.0Z"),
  "view": NumberInt(0),
  "postId": "52a95e24471dee9c09000010",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52a993ba471dee9009000002"),
  "created": ISODate("2013-12-12T10:45:14.0Z"),
  "view": NumberInt(0),
  "postId": "52a993ba471dee9009000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52ad218b471dee7809000002"),
  "created": ISODate("2013-12-15T03:27:07.0Z"),
  "view": NumberInt(0),
  "postId": "52ad218b471dee7809000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52ad2551471dee5809000002"),
  "created": ISODate("2013-12-15T03:43:13.0Z"),
  "view": NumberInt(0),
  "postId": "52ad2551471dee5809000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52ad268c471dee1805000002"),
  "created": ISODate("2013-12-15T03:48:28.0Z"),
  "view": NumberInt(0),
  "postId": "52ad268c471dee1805000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52ad26a3471dee5c09000002"),
  "created": ISODate("2013-12-15T03:48:51.0Z"),
  "view": NumberInt(0),
  "postId": "52ad26a3471dee5c09000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52ad32fd471dee3c09000002"),
  "created": ISODate("2013-12-15T04:41:33.0Z"),
  "view": NumberInt(0),
  "postId": "52ad32fd471dee3c09000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b3eac0471dee9809000002"),
  "created": ISODate("2013-12-20T06:59:12.0Z"),
  "view": NumberInt(0),
  "postId": "52b3eac0471dee9809000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b3ec44471dee5809000003"),
  "created": ISODate("2013-12-20T07:08:24.0Z"),
  "view": NumberInt(0),
  "postId": "52b3ec44471dee5809000002",
  "type": "User",
  "typeId": "5260e5b4471dee6c08000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b42ce6471dee8409000002"),
  "created": ISODate("2013-12-20T11:41:26.0Z"),
  "view": NumberInt(0),
  "postId": "52b42ce6471dee8409000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b42d20471dee9409000002"),
  "created": ISODate("2014-01-05T04:22:48.0Z"),
  "view": NumberInt(0),
  "postId": "52b42d20471dee9409000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b46fb0471dee7409000002"),
  "created": ISODate("2013-12-20T16:26:24.0Z"),
  "view": NumberInt(0),
  "postId": "52b46fb0471dee7409000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b4700b471deef808000002"),
  "created": ISODate("2013-12-20T16:27:55.0Z"),
  "view": NumberInt(0),
  "postId": "52b4700b471deef808000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b47055471deef808000005"),
  "created": ISODate("2013-12-20T16:29:09.0Z"),
  "view": NumberInt(0),
  "postId": "52b47055471deef808000004",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b4714b471deef808000008"),
  "created": ISODate("2013-12-20T16:33:15.0Z"),
  "view": NumberInt(0),
  "postId": "52b4714b471deef808000007",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b47177471dee9009000002"),
  "created": ISODate("2013-12-20T16:33:59.0Z"),
  "view": NumberInt(0),
  "postId": "52b47177471dee9009000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b471ed471deea009000002"),
  "created": ISODate("2013-12-20T16:35:57.0Z"),
  "view": NumberInt(0),
  "postId": "52b471ed471deea009000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b473a7471dee9009000006"),
  "created": ISODate("2013-12-20T16:43:19.0Z"),
  "view": NumberInt(0),
  "postId": "52b473a7471dee9009000005",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b473f0471deef80800000c"),
  "created": ISODate("2013-12-20T16:44:32.0Z"),
  "view": NumberInt(0),
  "postId": "52b473f0471deef80800000b",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b54da6471deed80c000002"),
  "created": ISODate("2013-12-21T08:13:26.0Z"),
  "view": NumberInt(0),
  "postId": "52b54da6471deed80c000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b54e92471deed80c000005"),
  "created": ISODate("2013-12-21T08:17:22.0Z"),
  "view": NumberInt(0),
  "postId": "52b54e92471deed80c000004",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b55c8c471deec80c000002"),
  "created": ISODate("2013-12-21T09:17:00.0Z"),
  "view": NumberInt(0),
  "postId": "52b55c8c471deec80c000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b55dbb471deecc0c000002"),
  "created": ISODate("2013-12-21T09:22:02.0Z"),
  "view": NumberInt(0),
  "postId": "52b55dbb471deecc0c000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b561e1471deecc0c000005"),
  "created": ISODate("2013-12-21T09:39:45.0Z"),
  "view": NumberInt(0),
  "postId": "52b561e1471deecc0c000004",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b561f8471deecc0c000008"),
  "created": ISODate("2013-12-21T09:56:32.0Z"),
  "view": NumberInt(0),
  "postId": "52b561f8471deecc0c000007",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b67aab471dee340b000002"),
  "created": ISODate("2013-12-22T05:37:47.0Z"),
  "view": NumberInt(0),
  "postId": "52b67aab471dee340b000001",
  "type": "User",
  "typeId": "518f5f43471deeb40900001f"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b67b59471dee2c0b000002"),
  "created": ISODate("2013-12-22T05:40:41.0Z"),
  "view": NumberInt(0),
  "postId": "52b67b59471dee2c0b000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b67b63471dee2c0b000005"),
  "created": ISODate("2013-12-22T05:40:51.0Z"),
  "view": NumberInt(0),
  "postId": "52b67b63471dee2c0b000004",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b67b93471dee2c0b000008"),
  "created": ISODate("2013-12-22T05:41:39.0Z"),
  "view": NumberInt(0),
  "postId": "52b67b93471dee2c0b000007",
  "type": "User",
  "typeId": "518f5f43471deeb40900001f"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b67be9471dee2c0b00000b"),
  "created": ISODate("2013-12-22T05:43:05.0Z"),
  "view": NumberInt(0),
  "postId": "52b67be9471dee2c0b00000a",
  "type": "User",
  "typeId": "518f5f43471deeb40900001f"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b67c40471dee2c0b00000e"),
  "created": ISODate("2013-12-22T05:44:32.0Z"),
  "view": NumberInt(0),
  "postId": "52b67c40471dee2c0b00000d",
  "type": "User",
  "typeId": "518f5f43471deeb40900001f"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b69e99471dee2c0b000012"),
  "created": ISODate("2013-12-22T08:11:05.0Z"),
  "view": NumberInt(0),
  "postId": "52b69e99471dee2c0b000011",
  "type": "User",
  "typeId": "518f5f43471deeb40900001f"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52b7d20f471dee280b000002"),
  "created": ISODate("2013-12-23T06:02:55.0Z"),
  "view": NumberInt(0),
  "postId": "52b7d20f471dee280b000001",
  "type": "User",
  "typeId": "518f5f43471deeb40900001f"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52bac834471deee00a000006"),
  "created": ISODate("2013-12-25T11:57:39.0Z"),
  "view": NumberInt(0),
  "postId": "52bac833471deee00a000005",
  "type": "User",
  "typeId": "518f5f43471deeb40900001f"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c4ec91471deea40a000002"),
  "created": ISODate("2014-01-02T04:35:29.0Z"),
  "view": NumberInt(0),
  "postId": "52c4ec91471deea40a000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c4edb8471deea40a000007"),
  "created": ISODate("2014-01-02T04:40:24.0Z"),
  "view": NumberInt(0),
  "postId": "52c4edb8471deea40a000006",
  "type": "User",
  "typeId": "52c26cdf471dee640a000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c4edcb471deea40a00000c"),
  "created": ISODate("2014-01-02T04:40:43.0Z"),
  "view": NumberInt(0),
  "postId": "52c4edcb471deea40a00000b",
  "type": "User",
  "typeId": "52c26cdf471dee640a000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c54328471dee880a000002"),
  "created": ISODate("2014-01-02T10:44:56.0Z"),
  "view": NumberInt(0),
  "postId": "52c54328471dee880a000001",
  "type": "User",
  "typeId": "52c26cdf471dee640a000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c54472471dee7c0a000004"),
  "created": ISODate("2014-01-02T10:50:26.0Z"),
  "view": NumberInt(0),
  "postId": "52c54472471dee7c0a000003",
  "type": "User",
  "typeId": "52c26cdf471dee640a000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c544b8471dee7c0a000009"),
  "created": ISODate("2014-01-02T10:51:36.0Z"),
  "view": NumberInt(0),
  "postId": "52c544b8471dee7c0a000008",
  "type": "User",
  "typeId": "52c26cdf471dee640a000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c592a3471deec809000002"),
  "created": ISODate("2014-01-02T16:24:03.0Z"),
  "view": NumberInt(0),
  "postId": "52c592a3471deec809000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c592d3471deec809000005"),
  "created": ISODate("2014-01-02T16:24:51.0Z"),
  "view": NumberInt(0),
  "postId": "52c592d3471deec809000004",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c592ff471deec809000008"),
  "created": ISODate("2014-01-02T16:25:35.0Z"),
  "view": NumberInt(0),
  "postId": "52c592ff471deec809000007",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c5965b471deec80900000b"),
  "created": ISODate("2014-01-02T16:39:55.0Z"),
  "view": NumberInt(0),
  "postId": "52c5965b471deec80900000a",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c5967c471deec80900000e"),
  "created": ISODate("2014-01-02T16:40:28.0Z"),
  "view": NumberInt(0),
  "postId": "52c5967c471deec80900000d",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c59893471dee7c0a00000d"),
  "created": ISODate("2014-01-02T16:49:23.0Z"),
  "view": NumberInt(0),
  "postId": "52c59893471dee7c0a00000c",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c59a0e471dee7c0a000010"),
  "created": ISODate("2014-01-02T16:55:42.0Z"),
  "view": NumberInt(0),
  "postId": "52c59a0e471dee7c0a00000f",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c59aed471dee7c0a000013"),
  "created": ISODate("2014-01-02T16:59:25.0Z"),
  "view": NumberInt(0),
  "postId": "52c59aed471dee7c0a000012",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c75723471dee800b000002"),
  "created": ISODate("2014-01-04T00:34:42.0Z"),
  "view": NumberInt(0),
  "postId": "52c75723471dee800b000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c7573a471dee900b000002"),
  "created": ISODate("2014-01-04T00:35:06.0Z"),
  "view": NumberInt(0),
  "postId": "52c7573a471dee900b000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c75762471dee4c0b000002"),
  "created": ISODate("2014-01-05T05:20:53.0Z"),
  "view": NumberInt(0),
  "postId": "52c75762471dee4c0b000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c759f3471dee800b000005"),
  "created": ISODate("2014-01-04T00:46:43.0Z"),
  "view": NumberInt(0),
  "postId": "52c759f3471dee800b000004",
  "type": "User",
  "typeId": "518f5f43471deeb40900001f"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c75a79471dee4c0b000005"),
  "created": ISODate("2014-01-04T00:48:57.0Z"),
  "view": NumberInt(0),
  "postId": "52c75a79471dee4c0b000004",
  "type": "User",
  "typeId": "518f5f43471deeb40900001f"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c8ec93471dee9c09000003"),
  "created": ISODate("2014-01-05T05:24:35.0Z"),
  "view": NumberInt(0),
  "postId": "52c8ec93471dee9c09000002",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c8ed57471dee9c09000006"),
  "created": ISODate("2014-01-05T05:27:51.0Z"),
  "view": NumberInt(0),
  "postId": "52c8ed57471dee9c09000005",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c8ed61471dee9c09000009"),
  "created": ISODate("2014-01-05T05:28:01.0Z"),
  "view": NumberInt(0),
  "postId": "52c8ed61471dee9c09000008",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52c8ee49471dee9c0900000c"),
  "created": ISODate("2014-01-05T05:31:59.0Z"),
  "view": NumberInt(0),
  "postId": "52c8ee49471dee9c0900000b",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52cd097c471dee3810000002"),
  "created": ISODate("2014-01-08T08:17:40.0Z"),
  "view": NumberInt(0),
  "postId": "52cd097c471dee3810000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52cd09c9471dee3810000006"),
  "created": ISODate("2014-01-08T08:18:17.0Z"),
  "view": NumberInt(0),
  "postId": "52cd09c9471dee3810000005",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52cd0a4d471dee3810000009"),
  "created": ISODate("2014-01-08T08:27:58.0Z"),
  "view": NumberInt(0),
  "postId": "52cd0a4d471dee3810000008",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52cd0aa5471dee381000000c"),
  "created": ISODate("2014-01-08T08:21:57.0Z"),
  "view": NumberInt(0),
  "postId": "52cd0aa5471dee381000000b",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52cd8b30471dee4010000004"),
  "created": ISODate("2014-01-08T17:30:23.0Z"),
  "view": NumberInt(0),
  "postId": "52cd8b2f471dee4010000003",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52cd8b64471dee1410000002"),
  "created": ISODate("2014-01-08T17:31:16.0Z"),
  "view": NumberInt(0),
  "postId": "52cd8b64471dee1410000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52cd8ba4471dee1810000002"),
  "created": ISODate("2014-01-08T17:32:20.0Z"),
  "view": NumberInt(0),
  "postId": "52cd8ba4471dee1810000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52cd8c0a471dee441000000a"),
  "created": ISODate("2014-01-08T17:34:01.0Z"),
  "view": NumberInt(0),
  "postId": "52cd8c09471dee4410000009",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52cd8c81471dee4010000007"),
  "created": ISODate("2014-01-08T17:36:01.0Z"),
  "view": NumberInt(0),
  "postId": "52cd8c81471dee4010000006",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52cd8e7d471dee1810000005"),
  "created": ISODate("2014-01-08T17:44:29.0Z"),
  "view": NumberInt(0),
  "postId": "52cd8e7d471dee1810000004",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52cd912e471dee040b000002"),
  "created": ISODate("2014-01-08T17:55:57.0Z"),
  "view": NumberInt(0),
  "postId": "52cd912e471dee040b000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52cd9220471deebc0a000002"),
  "created": ISODate("2014-01-08T17:59:59.0Z"),
  "view": NumberInt(0),
  "postId": "52cd921f471deebc0a000001",
  "type": "User",
  "typeId": "518f5f43471deeb40900001f"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52d6c31b471deea80a000002"),
  "created": ISODate("2014-01-15T17:19:23.0Z"),
  "view": NumberInt(0),
  "postId": "52d6c31b471deea80a000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52f50526471deeb00c000002"),
  "created": ISODate("2014-02-07T16:09:10.0Z"),
  "view": NumberInt(0),
  "postId": "52f50526471deeb00c000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52f90f76471deea80a000004"),
  "created": ISODate("2014-02-10T17:42:14.0Z"),
  "view": NumberInt(0),
  "postId": "52f90f76471deea80a000003",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52f9125e471deea80a000007"),
  "created": ISODate("2014-02-10T17:54:38.0Z"),
  "view": NumberInt(0),
  "postId": "52f9125e471deea80a000006",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52f912a9471deea80a00000a"),
  "created": ISODate("2014-02-10T17:55:53.0Z"),
  "view": NumberInt(0),
  "postId": "52f912a9471deea80a000009",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52f9154a471deeb40a000002"),
  "created": ISODate("2014-02-10T18:07:06.0Z"),
  "view": NumberInt(0),
  "postId": "52f9154a471deeb40a000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52f91556471deeb40a000005"),
  "created": ISODate("2014-02-10T18:07:18.0Z"),
  "view": NumberInt(0),
  "postId": "52f91556471deeb40a000004",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52f91b99471deeac0a000002"),
  "created": ISODate("2014-02-10T18:34:01.0Z"),
  "view": NumberInt(0),
  "postId": "52f91b99471deeac0a000001",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52f91ba8471deea80a00000e"),
  "created": ISODate("2014-02-11T08:20:43.0Z"),
  "view": NumberInt(0),
  "postId": "52f91ba8471deea80a00000d",
  "type": "User",
  "typeId": "518f5555471deea409000000"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52f91bbb471deea40a000002"),
  "created": ISODate("2014-02-10T18:34:35.0Z"),
  "view": NumberInt(0),
  "postId": "52f91bbb471deea40a000001",
  "type": "User",
  "typeId": "518f5f43471deeb40900001f"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52f91bd6471deeb40a000009"),
  "created": ISODate("2014-02-10T18:35:02.0Z"),
  "view": NumberInt(0),
  "postId": "52f91bd6471deeb40a000008",
  "type": "User",
  "typeId": "518f5f43471deeb40900001f"
});
db.getCollection("cache_post").insert({
  "_id": ObjectId("52f91c1b471dee9c0a000002"),
  "created": ISODate("2014-02-10T18:36:11.0Z"),
  "view": NumberInt(0),
  "postId": "52f91c1b471dee9c0a000001",
  "type": "User",
  "typeId": "518f5f43471deeb40900001f"
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
      "$id": ObjectId("5247a0a3471dee280c000037"),
      "$db": "yesocl"
    }
  ],
  "created": ISODate("2013-12-31T17:31:58.0Z"),
  "description": "&lt;p&gt;\r\n\tWebsite Solution - Protect Your Money&lt;\/p&gt;\r\n",
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
  "logo": "data\/catalog\/company\/51e97c88471dee180a000000\/\/avatar.png",
  "name": "Yestoc",
  "owner": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  },
  "slug": "yestoc",
  "status": true,
  "updated": ISODate("2013-12-31T17:31:59.0Z")
});
db.getCollection("company").insert({
  "_id": ObjectId("52c2fe6f471dee5809000000"),
  "branchs": [
    {
      "$ref": "branch",
      "$id": ObjectId("51d39ba5d87459c40a000017"),
      "$db": "yesocl"
    }
  ],
  "created": ISODate("2013-12-31T17:27:11.0Z"),
  "description": "&lt;p&gt;\r\n\tYesocl - Say Yes To Connect Your Business&lt;\/p&gt;\r\n",
  "group": {
    "$ref": "company_group",
    "$id": ObjectId("516b9417913db47809000003"),
    "$db": "yesocl"
  },
  "groupMembers": [
    {
      "_id": ObjectId("52c2fe6f471dee5809000001"),
      "name": "Default",
      "status": true,
      "canDel": false,
      "actions": [
        
      ],
      "members": [
        
      ]
    }
  ],
  "logo": "data\/catalog\/company\/52c2fe6f471dee5809000000\/\/avatar.png",
  "name": "Yesocl",
  "owner": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  },
  "slug": "yesocl",
  "status": true,
  "updated": ISODate("2013-12-31T17:27:11.0Z")
});

/** company_action records **/
db.getCollection("company_action").insert({
  "_id": ObjectId("51e01a09471dee0c09000000"),
  "name": "Add Member",
  "code": "add_member",
  "order": NumberInt(2)
});
db.getCollection("company_action").insert({
  "_id": ObjectId("51e01a24471dee0c09000002"),
  "name": "Remove Member",
  "code": "remove_member",
  "order": NumberInt(3)
});
db.getCollection("company_action").insert({
  "_id": ObjectId("51e01a32471dee5c09000000"),
  "name": "Add Category",
  "code": "add_category",
  "order": NumberInt(4)
});
db.getCollection("company_action").insert({
  "_id": ObjectId("51e01a45471dee0c09000004"),
  "name": "Remove Category",
  "code": "remove_category",
  "order": NumberInt(5)
});
db.getCollection("company_action").insert({
  "_id": ObjectId("52f66803471dee3c0e000000"),
  "name": "Authorization",
  "code": "authorization",
  "order": NumberInt(1)
});
db.getCollection("company_action").insert({
  "_id": ObjectId("52f66869471deeec05000000"),
  "name": "Post on Branch",
  "code": "post_on_branch",
  "order": NumberInt(6)
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
db.getCollection("design_action").insert({
  "_id": ObjectId("52c275f2471dee640a00000a"),
  "name": "Copy",
  "code": "copy",
  "order": NumberInt(6)
});
db.getCollection("design_action").insert({
  "_id": ObjectId("52c275ff471dee640a00000c"),
  "name": "Move",
  "code": "move",
  "order": NumberInt(7)
});
db.getCollection("design_action").insert({
  "_id": ObjectId("52c27609471dee640a00000e"),
  "name": "Upload",
  "code": "upload",
  "order": NumberInt(8)
});
db.getCollection("design_action").insert({
  "_id": ObjectId("52c27929471deecc0a000000"),
  "name": "Rename",
  "code": "rename",
  "order": NumberInt(9)
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
  "path": "company\/member_group"
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
db.getCollection("design_layout").insert({
  "_id": ObjectId("52694e2a471deed008000000"),
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
  "name": "Social Network",
  "path": "social\/network"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("52c27386471deed40a000000"),
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
      "$id": ObjectId("516a62b2471dee480b000006"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("52c275f2471dee640a00000a"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("52c275ff471dee640a00000c"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("52c27609471dee640a00000e"),
      "$db": "yesocl"
    },
    {
      "$ref": "design_action",
      "$id": ObjectId("52c27929471deecc0a000000"),
      "$db": "yesocl"
    }
  ],
  "name": "File Management",
  "path": "common\/filemanager"
});
db.getCollection("design_layout").insert({
  "_id": ObjectId("52fa7524471deee00a000000"),
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
  "name": "Branch Member",
  "path": "branch\/member"
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
db.getCollection("setting_config").insert({
  "_id": ObjectId("52c275f2471dee640a00000b"),
  "key": "action_copy",
  "value": "copy"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("52c275ff471dee640a00000d"),
  "key": "action_move",
  "value": "move"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("52c27609471dee640a00000f"),
  "key": "action_upload",
  "value": "upload"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("52c27929471deecc0a000001"),
  "key": "action_rename",
  "value": "rename"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("52f66803471dee3c0e000001"),
  "key": "company_action_authorization",
  "value": "authorization"
});
db.getCollection("setting_config").insert({
  "_id": ObjectId("52f66869471deeec05000001"),
  "key": "company_action_post_on_branch",
  "value": "post_on_branch"
});

/** social_network records **/
db.getCollection("social_network").insert({
  "_id": ObjectId("52bdac3c471deeac0a000000"),
  "name": "Facebook",
  "code": "facebook",
  "status": true
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
  "_id": ObjectId("52885f1a471deef408000000"),
  "created": ISODate("2013-11-17T06:15:54.0Z"),
  "emails": [
    {
      "_id": ObjectId("52885f1a471deef408000002"),
      "email": "user9@test.com",
      "primary": true
    }
  ],
  "friendRequests": [
    
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("516b4a91913db43009000000"),
    "$db": "yesocl"
  },
  "meta": {
    "_id": ObjectId("52885f1a471deef408000001"),
    "firstname": "user",
    "lastname": "9",
    "birthday": ISODate("2002-05-04T22:00:00.0Z"),
    "sex": NumberInt(1)
  },
  "password": "fb7de4c7965e91d4f13b63f52c3ca4d0bd0dc315",
  "refreshIds": [
    
  ],
  "salt": "cfb5654d7",
  "slug": "user-temp-5",
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
    "518f5555471deea409000000"
  ],
  "friends": [
    
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
      "_id": ObjectId("52c759e3471deea00b000000"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      },
      "created": ISODate("2014-01-04T00:46:27.0Z")
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
      "_id": ObjectId("52b3ebc8471dee4c09000000"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "created": ISODate("2013-12-20T07:03:36.0Z")
    },
    {
      "_id": ObjectId("52b3ecaf471dee5809000005"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("5296a817471dee180b000000"),
        "$db": "yesocl"
      },
      "created": ISODate("2013-12-20T07:07:27.0Z")
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
  "notifications": [
    {
      "_id": ObjectId("52b3ec61471dee9809000006"),
      "action": "like",
      "actor": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "type": "user",
      "object": "post",
      "objectId": "52b3ec44471dee5809000002",
      "slug": "52b3ec44471dee5809000000",
      "read": true,
      "status": true,
      "created": ISODate("2013-12-20T07:06:09.0Z")
    },
    {
      "_id": ObjectId("52b3ecbe471dee5809000007"),
      "action": "like",
      "actor": {
        "$ref": "user",
        "$id": ObjectId("5296a817471dee180b000000"),
        "$db": "yesocl"
      },
      "type": "user",
      "object": "post",
      "objectId": "52b3ec44471dee5809000002",
      "slug": "52b3ec44471dee5809000000",
      "read": true,
      "status": true,
      "created": ISODate("2013-12-20T07:07:42.0Z")
    }
  ],
  "password": "1c3b43d60529ff6cc7e24c1e65595acdf596fbba",
  "refreshIds": [
    
  ],
  "salt": "7b748a1b1",
  "slug": "user-temp-4",
  "status": true,
  "unRead": NumberInt(1)
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
      "_id": ObjectId("526bec22471dee100b000000"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52af3e7b471dee5408000001"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "created": ISODate("2013-12-16T17:55:07.0Z")
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
  "notifications": [
    {
      "_id": ObjectId("52b7d210471dee280b000004"),
      "action": "tag",
      "actor": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      },
      "type": "user",
      "object": "post",
      "objectId": "52b7d20f471dee280b000001",
      "slug": "hello-world-52b7d20f471dee280b000000",
      "read": false,
      "status": true,
      "created": ISODate("2013-12-23T06:02:56.0Z")
    }
  ],
  "password": "38cd494f4e20391887704da2c512fb7e9a8efe9c",
  "refreshIds": [
    
  ],
  "salt": "62df54b25",
  "slug": "user-temp",
  "status": true
});
db.getCollection("user").insert({
  "_id": ObjectId("52c26cdf471dee640a000000"),
  "avatar": "data\/catalog\/user\/52c26cdf471dee640a000000\/avatar.jpg",
  "created": ISODate("2013-12-31T07:06:07.0Z"),
  "emails": [
    {
      "_id": ObjectId("52c26cdf471dee640a000003"),
      "email": "thanhhuong_2704@yahoo.com.vn",
      "primary": true
    }
  ],
  "friends": [
    {
      "_id": ObjectId("52c4ed96471dee7c0a000001"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "created": ISODate("2014-01-02T04:39:50.0Z")
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("516b4a91913db43009000000"),
    "$db": "yesocl"
  },
  "isSocial": true,
  "meta": {
    "_id": ObjectId("52c26cdf471dee640a000001"),
    "background": {
      "_id": ObjectId("52c26ce0471dee640a000004"),
      "educations": [
        {
          "_id": ObjectId("52c26ce0471dee640a000005"),
          "school": "Trường THPT Ngô Gia Tự- eakar",
          "started": "",
          "ended": "2008",
          "degree": ""
        },
        {
          "_id": ObjectId("52c26ce0471dee640a000006"),
          "school": "Trường Đại học Tài chính - Marketing",
          "started": "",
          "ended": "",
          "degree": ""
        },
        {
          "_id": ObjectId("52c26ce0471dee640a000007"),
          "school": "Saigonact",
          "started": "",
          "ended": "",
          "degree": ""
        }
      ],
      "experiences": [
        {
          "_id": ObjectId("52c26ce0471dee640a000008"),
          "company": "The-c.vn",
          "location": {
            "_id": ObjectId("52c26ce0471dee640a000009"),
            "location": "Ho Chi Minh City, Vietnam"
          },
          "started": ISODate("2013-10-01T06:06:08.0Z"),
          "selfEmployed": false
        }
      ],
      "summary": " dsf dsafa dfsd fsadf sdf saf safsda fdsaf sdaf sad"
    },
    "birthday": ISODate("1990-04-26T22:00:00.0Z"),
    "current": "working at The-c.vn",
    "current_id": "52c26ce0471dee640a000008",
    "firstname": "Thanh",
    "lastname": "Hương",
    "location": {
      "_id": ObjectId("52c26cdf471dee640a000002"),
      "location": "Ho Chi Minh City, Vietnam"
    },
    "sex": NumberInt(2)
  },
  "notifications": [
    
  ],
  "refreshIds": [
    
  ],
  "salt": "ca7181196",
  "slug": "thanh-huong",
  "status": true,
  "unRead": NumberInt(0)
});
db.getCollection("user").insert({
  "_id": ObjectId("52d40c10471deee809000006"),
  "created": ISODate("2014-01-13T15:53:52.0Z"),
  "emails": [
    {
      "_id": ObjectId("52d40c10471deee809000008"),
      "email": "user10@test.com",
      "primary": true
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("516b4a91913db43009000000"),
    "$db": "yesocl"
  },
  "isSocial": false,
  "meta": {
    "_id": ObjectId("52d40c10471deee809000007"),
    "firstname": "bommer",
    "lastname": "10",
    "birthday": ISODate("1990-08-12T17:00:00.0Z"),
    "sex": NumberInt(1),
    "current": "unknow"
  },
  "password": "064275b6fea34e11d2344d5a1dbf0469436e72d3",
  "refreshIds": [
    
  ],
  "salt": "3bf61c766",
  "slug": "bommer-10",
  "status": true,
  "token": "9e0bd825551a31b252625bc3f62b4aaf",
  "tokenTime": ISODate("2014-01-20T15:53:53.0Z")
});
db.getCollection("user").insert({
  "_id": ObjectId("518f5555471deea409000000"),
  "avatar": "data\/catalog\/user\/518f5555471deea409000000\/avatar.jpg",
  "created": ISODate("2013-05-12T08:39:48.0Z"),
  "emails": [
    {
      "_id": ObjectId("52bb0c3c471deed00a00000f"),
      "email": "quangthi_90@yahoo.com.vn",
      "primary": true
    }
  ],
  "friendRequests": [
    "52c1a856471deea40a000003"
  ],
  "friends": [
    {
      "_id": ObjectId("529ee7b0471deed80a000001"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      },
      "created": ISODate("2013-12-04T08:28:32.0Z")
    },
    {
      "_id": ObjectId("52af3e7b471dee5408000000"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("525bd847471deea808000000"),
        "$db": "yesocl"
      },
      "created": ISODate("2013-12-16T17:55:07.0Z")
    },
    {
      "_id": ObjectId("52af4718471dee4409000000"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("5296a817471dee180b000000"),
        "$db": "yesocl"
      },
      "created": ISODate("2013-12-16T18:31:52.0Z")
    },
    {
      "_id": ObjectId("52b3ebc9471dee4c09000001"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("5260e5b4471dee6c08000000"),
        "$db": "yesocl"
      },
      "created": ISODate("2013-12-20T07:03:36.0Z")
    },
    {
      "_id": ObjectId("52c4ed96471dee7c0a000000"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "created": ISODate("2014-01-02T04:39:50.0Z")
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("516b4a91913db43009000000"),
    "$db": "yesocl"
  },
  "meta": {
    "_id": ObjectId("52bb0c3c471deed00a000000"),
    "address": "129\/6\/5 Lê Văn Thọ F11 Gò Vấp",
    "background": {
      "_id": ObjectId("52bb0c3c471deed00a000007"),
      "adviceForContact": "",
      "educations": [
        {
          "_id": ObjectId("52bb0c3c471deed00a00000c"),
          "school": "Vietnam National University - Ha Noi",
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
          "_id": ObjectId("52bb0c3c471deed00a00000d"),
          "school": "University of Economics Ho Chi Minh City",
          "school_id": "",
          "started": "2013",
          "ended": "2007",
          "degree": "Bachelor Of Engineering",
          "degree_id": "",
          "fieldOfStudy": "Information Technology",
          "fieldOfStudy_id": "",
          "grace": "",
          "societies": "",
          "description": ""
        },
        {
          "_id": ObjectId("52bb0c3c471deed00a00000e"),
          "school": "Vietnam National University - Ho Chi Minh City",
          "school_id": "",
          "started": "2013",
          "ended": "2013",
          "degree": "Master Of Library &amp; Information Science",
          "degree_id": "",
          "fieldOfStudy": "Information Technology",
          "fieldOfStudy_id": "",
          "grace": "",
          "societies": "",
          "description": ""
        }
      ],
      "experiences": [
        {
          "_id": ObjectId("52bb0c3c471deed00a000008"),
          "company": "YesGroup",
          "title": "3 năm kinh nghiệm về PHP",
          "location": {
            "_id": ObjectId("52bb0c3c471deed00a000009"),
            "location": "HCM, Việt Nam",
            "cityId": ""
          },
          "started": ISODate("2012-01-01T16:47:55.0Z"),
          "selfEmployed": false,
          "description": ""
        },
        {
          "_id": ObjectId("52bb0c3c471deed00a00000a"),
          "company": "ViDaIT",
          "title": "1 năm kinh nghiệm về Symfony",
          "location": {
            "_id": ObjectId("52bb0c3c471deed00a00000b"),
            "location": "HCM, Việt Nam",
            "cityId": ""
          },
          "started": ISODate("2013-01-01T16:47:55.0Z"),
          "selfEmployed": false,
          "description": ""
        },
        {
          "_id": ObjectId("52c170f3471deea80a000000"),
          "company": "BmDesign",
          "title": "fdsa fsdaf sdaf sadffdsa fsdaf sdaf sadf",
          "location": {
            "_id": ObjectId("52c170f3471deea80a000001"),
            "location": "HCM, Việt Nam"
          },
          "started": ISODate("2013-01-01T13:11:15.0Z"),
          "selfEmployed": false
        }
      ],
      "interest": "",
      "maritalStatus": false,
      "summary": "lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj slfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj slfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj slfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj lfkjasklfjdaskljfklsadjflksdaj"
    },
    "birthday": ISODate("1990-08-12T22:00:00.0Z"),
    "current": "working at YesGroup",
    "current_id": "52bb0c3c471deed00a000008",
    "firstname": "Bommer",
    "headingLine": "",
    "ims": [
      {
        "_id": ObjectId("52bb0c3c471deed00a000002"),
        "im": "user1",
        "type": "skype",
        "visible": "myfollow"
      }
    ],
    "industry": "Design",
    "industry_id": "514b0983913db4ac08000021",
    "lastname": "Luu",
    "location": {
      "_id": ObjectId("52bb0c3c471deed00a000001"),
      "location": "HCM, Việt Nam",
      "cityId": "5143bfca913db4a408000012"
    },
    "phones": [
      {
        "_id": ObjectId("52bb0c3c471deed00a000003"),
        "phone": "0903000333",
        "type": "mobile",
        "visible": "myfollow"
      },
      {
        "_id": ObjectId("52bb0c3c471deed00a000004"),
        "phone": "0328492842",
        "type": "mobile",
        "visible": "myfollow"
      },
      {
        "_id": ObjectId("52bb0c3c471deed00a000005"),
        "phone": "01265327779",
        "type": "telephone",
        "visible": "myfollow"
      }
    ],
    "postalCode": "84748",
    "sex": NumberInt(1),
    "websites": [
      {
        "_id": ObjectId("52bb0c3c471deed00a000006"),
        "url": "www.yesocl.com",
        "title": ""
      }
    ]
  },
  "notifications": [
    
  ],
  "password": "918ee61c3343e557ef1e75672fca90da58d8ce06",
  "posts": null,
  "refreshIds": [
    
  ],
  "salt": "09b2a07c9",
  "slug": "user1",
  "status": true,
  "unRead": NumberInt(0),
  "username": "Quang Thi"
});
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
      "_id": ObjectId("526bec22471dee100b000001"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("525bd847471deea808000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("529ee7b0471deed80a000000"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "created": ISODate("2013-12-04T08:28:32.0Z")
    },
    {
      "_id": ObjectId("52c759e3471deea00b000001"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("52601121471dee680b000000"),
        "$db": "yesocl"
      },
      "created": ISODate("2014-01-04T00:46:27.0Z")
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("516b4a91913db43009000000"),
    "$db": "yesocl"
  },
  "meta": {
    "_id": ObjectId("520677de471dee880b00000a"),
    "address": "129\/6\/5 Lê Văn Thọ F11 Gò Vấp",
    "background": {
      "_id": ObjectId("520677de471dee880b00000f"),
      "adviceForContact": "Et vim quando vocent theophrastus, cetero ullamcorper ne his",
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
      "experiences": [
        {
          "_id": ObjectId("52bab245471deecc09000000"),
          "company": "YesGroup",
          "title": "Developer Website",
          "location": {
            "_id": ObjectId("52bab245471deecc09000001"),
            "location": "HCM, Việt Nam"
          },
          "started": ISODate("2012-10-01T09:24:05.0Z"),
          "selfEmployed": false
        }
      ],
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
      "interest": "Eu nam eius consul aliquando, choro integre iuvaret no nec, ut pericula scripserit per. Nam eu alii idque, suas patrioque vituperata ex est.",
      "maritalStatus": true
    },
    "birthday": ISODate("2013-08-10T17:26:54.0Z"),
    "current": "working at YesGroup",
    "current_id": "52bab245471deecc09000000",
    "firstname": "user2",
    "headingLine": "Unum falli aperiri id pro. Ex impetus invenire eam.",
    "ims": [
      {
        "_id": ObjectId("520677de471dee880b00000c"),
        "im": "user2",
        "type": "skype",
        "visible": "myfollow"
      }
    ],
    "industry": "Chemicals",
    "industry_id": "514b0970913db4ac08000020",
    "lastname": "yesocl",
    "location": {
      "_id": ObjectId("529ac5f8471dee6c0a000000"),
      "location": "HCM, Việt Nam",
      "cityId": "5143bfca913db4a408000012"
    },
    "phones": [
      {
        "_id": ObjectId("520677de471dee880b00000d"),
        "phone": "0904000444",
        "type": "mobile",
        "visible": "myfollow"
      }
    ],
    "postalCode": "84938",
    "sex": NumberInt(1),
    "websites": [
      {
        "_id": ObjectId("520677de471dee880b00000e"),
        "url": "www.yesocl.com",
        "title": ""
      }
    ]
  },
  "notifications": [
    
  ],
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
  "unRead": NumberInt(0),
  "username": "user2"
});

/** user_friend records **/
db.getCollection("user_friend").insert({
  "_id": ObjectId("530637a6471dee700b000000"),
  "friends": [
    {
      "_id": ObjectId("53085e08471deeb40b000000"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "created": ISODate("2014-02-22T08:21:28.0Z")
    }
  ],
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5f43471deeb40900001f"),
    "$db": "yesocl"
  }
});
db.getCollection("user_friend").insert({
  "_id": ObjectId("530637a6471dee700b000001"),
  "friends": [
    {
      "_id": ObjectId("53085e08471deeb40b000001"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      },
      "created": ISODate("2014-02-22T08:21:28.0Z")
    }
  ],
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});

/** user_group records **/
db.getCollection("user_group").insert({
  "_id": ObjectId("516b4a91913db43009000000"),
  "name": "Default"
});

/** user_message records **/
db.getCollection("user_message").insert({
  "_id": ObjectId("52f9e8e7471deed40a000000"),
  "lastMessages": [
    {
      "_id": ObjectId("52f9edb9471deef40a000004"),
      "content": "vdsa fdsa fsad",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-02-11T09:30:33.0Z")
    }
  ],
  "messages": [
    {
      "_id": ObjectId("52f9e8e7471deed40a000001"),
      "content": "jfkldasj klfads",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-02-11T09:09:59.0Z")
    },
    {
      "_id": ObjectId("52f9eb27471deed40a000004"),
      "content": "f sadf adsfa s",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-02-11T09:19:35.0Z")
    },
    {
      "_id": ObjectId("52f9edb9471deef40a000004"),
      "content": "vdsa fdsa fsad",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-02-11T09:30:33.0Z")
    }
  ],
  "user": {
    "$ref": "user",
    "$id": ObjectId("5260e5b4471dee6c08000000"),
    "$db": "yesocl"
  }
});
db.getCollection("user_message").insert({
  "_id": ObjectId("52d37ebb471dee580a000000"),
  "lastMessages": [
    {
      "_id": ObjectId("52d3aeb0471dee800a000023"),
      "content": "21",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T09:15:28.0Z")
    }
  ],
  "messages": [
    {
      "_id": ObjectId("52d37ebb471dee580a000001"),
      "content": "hello bommer",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T05:50:51.0Z")
    },
    {
      "_id": ObjectId("52d37f0b471dee580a000003"),
      "content": "fds afa sfasd",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T05:52:11.0Z")
    },
    {
      "_id": ObjectId("52d3a80c471dee800a000001"),
      "content": "1",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T08:47:08.0Z")
    },
    {
      "_id": ObjectId("52d3a80d471dee800a000003"),
      "content": "2",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T08:47:09.0Z")
    },
    {
      "_id": ObjectId("52d3a817471dee800a000005"),
      "content": "3",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T08:47:19.0Z")
    },
    {
      "_id": ObjectId("52d3a81f471dee800a000007"),
      "content": "4",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T08:47:27.0Z")
    },
    {
      "_id": ObjectId("52d3a8c2471dee880a000001"),
      "content": "5",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T08:50:10.0Z")
    },
    {
      "_id": ObjectId("52d3ad52471deee809000001"),
      "content": "6",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T09:09:38.0Z")
    },
    {
      "_id": ObjectId("52d3ad55471deee809000003"),
      "content": "7",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T09:09:41.0Z")
    },
    {
      "_id": ObjectId("52d3ae6b471deee809000005"),
      "content": "8",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T09:14:19.0Z")
    },
    {
      "_id": ObjectId("52d3ae84471dee800a00000b"),
      "content": "9",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T09:14:44.0Z")
    },
    {
      "_id": ObjectId("52d3ae87471dee800a00000d"),
      "content": "10",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T09:14:47.0Z")
    },
    {
      "_id": ObjectId("52d3ae96471dee800a00000f"),
      "content": "11",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T09:15:02.0Z")
    },
    {
      "_id": ObjectId("52d3aea0471dee800a000011"),
      "content": "12",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T09:15:12.0Z")
    },
    {
      "_id": ObjectId("52d3aea1471dee800a000013"),
      "content": "13",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T09:15:13.0Z")
    },
    {
      "_id": ObjectId("52d3aea3471dee800a000015"),
      "content": "14",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T09:15:15.0Z")
    },
    {
      "_id": ObjectId("52d3aea5471dee800a000017"),
      "content": "15",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T09:15:17.0Z")
    },
    {
      "_id": ObjectId("52d3aea6471dee800a000019"),
      "content": "16",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T09:15:18.0Z")
    },
    {
      "_id": ObjectId("52d3aea8471dee800a00001b"),
      "content": "17",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T09:15:20.0Z")
    },
    {
      "_id": ObjectId("52d3aeaa471dee800a00001d"),
      "content": "18",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T09:15:22.0Z")
    },
    {
      "_id": ObjectId("52d3aead471dee800a00001f"),
      "content": "19",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T09:15:25.0Z")
    },
    {
      "_id": ObjectId("52d3aeaf471dee800a000021"),
      "content": "20",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T09:15:27.0Z")
    },
    {
      "_id": ObjectId("52d3aeb0471dee800a000023"),
      "content": "21",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": false,
      "created": ISODate("2014-01-13T09:15:28.0Z")
    }
  ],
  "user": {
    "$ref": "user",
    "$id": ObjectId("52c26cdf471dee640a000000"),
    "$db": "yesocl"
  }
});
db.getCollection("user_message").insert({
  "_id": ObjectId("52d37e82471deea00a000000"),
  "lastMessages": [
    {
      "_id": ObjectId("52f9ee05471dee000b000003"),
      "content": "jflkdasj lfksad",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": true,
      "created": ISODate("2014-02-11T09:31:49.0Z")
    }
  ],
  "messages": [
    {
      "_id": ObjectId("52d37e82471deea00a000002"),
      "content": "hello bommer",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T05:49:54.0Z")
    },
    {
      "_id": ObjectId("52d37ea1471deea00a000004"),
      "content": "hi abc",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T05:50:25.0Z")
    },
    {
      "_id": ObjectId("52d3a948471dee880a000003"),
      "content": "fsdfsadf",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": true,
      "created": ISODate("2014-01-13T08:52:24.0Z")
    },
    {
      "_id": ObjectId("52d3a96e471dee800a000008"),
      "content": "fgfsgdfs",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T08:53:02.0Z")
    },
    {
      "_id": ObjectId("52d3a99e471deee009000001"),
      "content": "fdasfsadfsa",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": true,
      "created": ISODate("2014-01-13T08:53:50.0Z")
    },
    {
      "_id": ObjectId("52d3aa73471dee8c0a000001"),
      "content": "88",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": true,
      "created": ISODate("2014-01-13T08:57:23.0Z")
    },
    {
      "_id": ObjectId("52d3aaeb471dee880a000005"),
      "content": "99",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": true,
      "created": ISODate("2014-01-13T08:59:23.0Z")
    },
    {
      "_id": ObjectId("52d3ab11471dee8c0a000003"),
      "content": "10",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": true,
      "created": ISODate("2014-01-13T09:00:01.0Z")
    },
    {
      "_id": ObjectId("52d41adf471dee400a000000"),
      "content": "f dsf sad",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T16:57:02.0Z")
    },
    {
      "_id": ObjectId("52d41ae9471dee800a000024"),
      "content": "fsdaf sda",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T16:57:13.0Z")
    },
    {
      "_id": ObjectId("52ecdcde471deec80b000001"),
      "content": "hello",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": true,
      "created": ISODate("2014-02-01T11:39:09.0Z")
    },
    {
      "_id": ObjectId("52f90309471deea80a000001"),
      "content": "abc xyz",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": true,
      "created": ISODate("2014-02-10T16:49:13.0Z")
    },
    {
      "_id": ObjectId("52f9e875471dee000b000001"),
      "content": "hello user 2",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": true,
      "created": ISODate("2014-02-11T09:08:05.0Z")
    },
    {
      "_id": ObjectId("52f9ee05471dee000b000003"),
      "content": "jflkdasj lfksad",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": true,
      "created": ISODate("2014-02-11T09:31:49.0Z")
    }
  ],
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5f43471deeb40900001f"),
    "$db": "yesocl"
  }
});
db.getCollection("user_message").insert({
  "_id": ObjectId("52d37e82471deea00a000001"),
  "lastMessages": [
    {
      "_id": ObjectId("52d3aeb0471dee800a000022"),
      "content": "21",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T09:15:28.0Z")
    },
    {
      "_id": ObjectId("52f9edb9471deef40a000003"),
      "content": "vdsa fdsa fsad",
      "object": {
        "$ref": "user",
        "$id": ObjectId("5260e5b4471dee6c08000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-02-11T09:30:33.0Z")
    },
    {
      "_id": ObjectId("52f9ee05471dee000b000002"),
      "content": "jflkdasj lfksad",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-02-11T09:31:49.0Z")
    }
  ],
  "messages": [
    {
      "_id": ObjectId("52d37ebb471dee580a000002"),
      "content": "hello bommer",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": true,
      "created": ISODate("2014-01-13T05:50:51.0Z")
    },
    {
      "_id": ObjectId("52d37f0b471dee580a000004"),
      "content": "fds afa sfasd",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": false,
      "read": true,
      "created": ISODate("2014-01-13T05:52:11.0Z")
    },
    {
      "_id": ObjectId("52d3a80c471dee800a000000"),
      "content": "1",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T08:47:08.0Z")
    },
    {
      "_id": ObjectId("52d3a80d471dee800a000002"),
      "content": "2",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T08:47:09.0Z")
    },
    {
      "_id": ObjectId("52d3a817471dee800a000004"),
      "content": "3",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T08:47:19.0Z")
    },
    {
      "_id": ObjectId("52d3a81f471dee800a000006"),
      "content": "4",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T08:47:27.0Z")
    },
    {
      "_id": ObjectId("52d3a8c2471dee880a000000"),
      "content": "5",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T08:50:10.0Z")
    },
    {
      "_id": ObjectId("52d3ad52471deee809000000"),
      "content": "6",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T09:09:38.0Z")
    },
    {
      "_id": ObjectId("52d3ad55471deee809000002"),
      "content": "7",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T09:09:41.0Z")
    },
    {
      "_id": ObjectId("52d3ae6b471deee809000004"),
      "content": "8",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T09:14:19.0Z")
    },
    {
      "_id": ObjectId("52d3ae84471dee800a00000a"),
      "content": "9",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T09:14:44.0Z")
    },
    {
      "_id": ObjectId("52d3ae87471dee800a00000c"),
      "content": "10",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T09:14:47.0Z")
    },
    {
      "_id": ObjectId("52d3ae96471dee800a00000e"),
      "content": "11",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T09:15:02.0Z")
    },
    {
      "_id": ObjectId("52d3aea0471dee800a000010"),
      "content": "12",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T09:15:12.0Z")
    },
    {
      "_id": ObjectId("52d3aea1471dee800a000012"),
      "content": "13",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T09:15:13.0Z")
    },
    {
      "_id": ObjectId("52d3aea3471dee800a000014"),
      "content": "14",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T09:15:15.0Z")
    },
    {
      "_id": ObjectId("52d3aea5471dee800a000016"),
      "content": "15",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T09:15:17.0Z")
    },
    {
      "_id": ObjectId("52d3aea6471dee800a000018"),
      "content": "16",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T09:15:18.0Z")
    },
    {
      "_id": ObjectId("52d3aea8471dee800a00001a"),
      "content": "17",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T09:15:20.0Z")
    },
    {
      "_id": ObjectId("52d3aeaa471dee800a00001c"),
      "content": "18",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T09:15:22.0Z")
    },
    {
      "_id": ObjectId("52d3aeaf471dee800a000020"),
      "content": "20",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T09:15:27.0Z")
    },
    {
      "_id": ObjectId("52d3aeb0471dee800a000022"),
      "content": "21",
      "object": {
        "$ref": "user",
        "$id": ObjectId("52c26cdf471dee640a000000"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-01-13T09:15:28.0Z")
    },
    {
      "_id": ObjectId("52f9ee05471dee000b000002"),
      "content": "jflkdasj lfksad",
      "object": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      },
      "isSender": true,
      "read": true,
      "created": ISODate("2014-02-11T09:31:49.0Z")
    }
  ],
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});

/** user_post records **/
db.getCollection("user_post").insert({
  "_id": ObjectId("526bec37471dee000b000001"),
  "posts": [
    {
      "_id": ObjectId("526bec37471dee000b000002"),
      "author": "user2",
      "comments": [
        {
          "_id": ObjectId("526bee08471dee240b000001"),
          "author": "Bommer Luu",
          "content": "hello user 2",
          "created": ISODate("2013-10-26T16:30:00.0Z"),
          "deleted": false,
          "email": "user3@test.com",
          "status": true,
          "updated": ISODate("2013-10-26T16:30:00.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("525bd847471deea808000000"),
            "$db": "yesocl"
          }
        },
        {
          "_id": ObjectId("5271b655471deee80a000000"),
          "author": "Bommer Luu",
          "content": "hello bommer",
          "created": ISODate("2013-10-31T01:45:57.0Z"),
          "deleted": false,
          "email": "user3@test.com",
          "status": true,
          "updated": ISODate("2013-10-31T01:45:57.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("525bd847471deea808000000"),
            "$db": "yesocl"
          }
        }
      ],
      "content": "hello user 3",
      "created": ISODate("2013-10-26T16:22:15.0Z"),
      "deleted": false,
      "email": "user2@test.com",
      "slug": "526bec37471dee000b000000",
      "status": true,
      "updated": ISODate("2013-10-31T01:45:57.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5271b613471deedc0a000001"),
      "content": "abc xyz",
      "status": true,
      "created": ISODate("2013-10-31T01:44:51.0Z"),
      "updated": ISODate("2013-10-31T01:44:51.0Z"),
      "author": "Bommer Luu",
      "email": "user3@test.com",
      "user": {
        "$ref": "user",
        "$id": ObjectId("525bd847471deea808000000"),
        "$db": "yesocl"
      },
      "slug": "5271b613471deedc0a000000",
      "deleted": false
    },
    {
      "_id": ObjectId("5271b631471deeec0a000001"),
      "content": "lưu quang thi",
      "status": true,
      "created": ISODate("2013-10-31T01:45:21.0Z"),
      "updated": ISODate("2013-10-31T01:45:22.0Z"),
      "author": "Bommer Luu",
      "email": "user3@test.com",
      "user": {
        "$ref": "user",
        "$id": ObjectId("525bd847471deea808000000"),
        "$db": "yesocl"
      },
      "slug": "5271b631471deeec0a000000",
      "deleted": false
    },
    {
      "_id": ObjectId("5275af3e471dee940b000006"),
      "author": "Quang Thi",
      "comments": [
        {
          "_id": ObjectId("5275af56471dee940b000008"),
          "author": "Quang Thi",
          "content": "jhiuhiuhui",
          "created": ISODate("2013-11-03T02:05:10.0Z"),
          "deleted": false,
          "email": "quangthi_90@yahoo.com.vn",
          "status": true,
          "updated": ISODate("2013-11-03T02:05:10.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("518f5555471deea409000000"),
            "$db": "yesocl"
          }
        },
        {
          "_id": ObjectId("52760a61471dee040c000000"),
          "author": "Quang Thi",
          "content": "kjhkjhkjhk",
          "created": ISODate("2013-11-03T08:33:37.0Z"),
          "deleted": false,
          "email": "quangthi_90@yahoo.com.vn",
          "status": true,
          "updated": ISODate("2013-11-03T08:33:37.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("518f5555471deea409000000"),
            "$db": "yesocl"
          }
        }
      ],
      "content": "ytgyugyijhhyi",
      "created": ISODate("2013-11-03T02:04:46.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "slug": "5275af3e471dee940b000005",
      "status": true,
      "updated": ISODate("2013-11-03T08:33:37.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    }
  ],
  "user": {
    "$ref": "user",
    "$id": ObjectId("525bd847471deea808000000"),
    "$db": "yesocl"
  }
});
db.getCollection("user_post").insert({
  "_id": ObjectId("52b3ec44471dee5809000001"),
  "posts": [
    {
      "_id": ObjectId("52b3ec44471dee5809000002"),
      "author": "Bommer Luu",
      "comments": [
        {
          "_id": ObjectId("52b3ecda471dee6c09000002"),
          "author": "Lưu Quang Thi",
          "content": "nhảm",
          "created": ISODate("2013-12-20T07:08:10.0Z"),
          "deleted": false,
          "email": "user4@test.com",
          "likerIds": [
            "5260e5b4471dee6c08000000"
          ],
          "status": true,
          "updated": ISODate("2013-12-20T07:08:20.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("5296a817471dee180b000000"),
            "$db": "yesocl"
          }
        },
        {
          "_id": ObjectId("52b3ece8471dee7c09000001"),
          "author": "Bommer Luu",
          "content": "quá nhảm",
          "created": ISODate("2013-12-20T07:08:24.0Z"),
          "deleted": false,
          "email": "user8@test.com",
          "status": true,
          "updated": ISODate("2013-12-20T07:08:24.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("5260e5b4471dee6c08000000"),
            "$db": "yesocl"
          }
        }
      ],
      "content": "Hôm trời đẹp quá ^^",
      "countViewer": NumberInt(1),
      "created": ISODate("2013-12-20T07:05:40.0Z"),
      "deleted": false,
      "email": "user8@test.com",
      "likerIds": [
        "518f5555471deea409000000",
        "5296a817471dee180b000000"
      ],
      "slug": "52b3ec44471dee5809000000",
      "status": true,
      "updated": ISODate("2013-12-20T07:09:52.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("5260e5b4471dee6c08000000"),
        "$db": "yesocl"
      }
    }
  ],
  "user": {
    "$ref": "user",
    "$id": ObjectId("5260e5b4471dee6c08000000"),
    "$db": "yesocl"
  }
});
db.getCollection("user_post").insert({
  "_id": ObjectId("52486543471dee340b000003"),
  "posts": [
    {
      "_id": ObjectId("52b69e99471dee2c0b000011"),
      "author": "user2",
      "content": "hello &lt;a href=&quot;http:\/\/localhost\/yesocl\/wall-page\/user1\/&quot; class=&quot;wall-link&quot; data-ref=&quot;user1&quot; data-content-syntax=&quot;@[Quang Thi](contact:user1)&quot;&gt;Quang Thi&lt;\/a&gt;",
      "countViewer": NumberInt(1),
      "created": ISODate("2013-12-22T08:11:05.0Z"),
      "deleted": false,
      "email": "user2@test.com",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "slug": "52b69e99471dee2c0b000010",
      "status": true,
      "updated": ISODate("2013-12-23T06:01:01.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52b7d20f471dee280b000001"),
      "title": "Hello world!",
      "content": "&lt;p&gt;&lt;span class=&quot;tag-wrapper&quot;&gt;&lt;span class=&quot;tagItem&quot; data-value=&quot;user1&quot; contenteditable=&quot;false&quot;&gt;&lt;b class=&quot;tag-name&quot;&gt;Quang Thi&lt;\/b&gt;&lt;a class=&quot;wall-link&quot; href=&quot;http:\/\/localhost\/yesocl\/wall-page\/user1\/&quot;&gt;Quang Thi&lt;\/a&gt;&lt;i class=&quot;icon-remove&quot;&gt;&lt;\/i&gt;&lt;\/span&gt;&lt;span class=&quot;space&quot;&gt;&amp;nbsp;Hello&amp;nbsp;&lt;span class=&quot;tag-wrapper&quot;&gt;&lt;span class=&quot;tagItem&quot; data-value=&quot;user-temp&quot; contenteditable=&quot;false&quot;&gt;&lt;b class=&quot;tag-name&quot;&gt;Bommer Luu&lt;\/b&gt;&lt;a class=&quot;wall-link&quot; href=&quot;http:\/\/localhost\/yesocl\/wall-page\/user-temp\/&quot;&gt;Bommer Luu&lt;\/a&gt;&lt;i class=&quot;icon-remove&quot;&gt;&lt;\/i&gt;&lt;\/span&gt;&lt;span class=&quot;space&quot;&gt;&amp;nbsp;&lt;\/span&gt;&lt;\/span&gt;&lt;\/span&gt;&lt;\/span&gt;&lt;br&gt;&lt;\/p&gt;",
      "status": true,
      "created": ISODate("2013-12-23T06:02:55.0Z"),
      "updated": ISODate("2013-12-23T06:07:40.0Z"),
      "author": "user2",
      "email": "user2@test.com",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      },
      "slug": "hello-world-52b7d20f471dee280b000000",
      "thumb": "data\/catalog\/user\/518f5f43471deeb40900001f\/post\/hello-world-52b7d20f471dee280b000000\/avatar.jpg",
      "deleted": false,
      "countViewer": NumberInt(1)
    },
    {
      "_id": ObjectId("52c759f3471dee800b000004"),
      "content": "hello &lt;a href=&quot;http:\/\/localhost\/yesocl\/wall-page\/user2\/&quot; class=&quot;wall-link&quot; data-ref=&quot;user2&quot; data-content-syntax=&quot;@[user2](contact:user2)&quot;&gt;user2&lt;\/a&gt;",
      "status": true,
      "created": ISODate("2014-01-04T00:46:43.0Z"),
      "updated": ISODate("2014-01-04T00:46:43.0Z"),
      "author": "Bommer Luu",
      "email": "user7@test.com",
      "user": {
        "$ref": "user",
        "$id": ObjectId("52601121471dee680b000000"),
        "$db": "yesocl"
      },
      "slug": "52c759f3471dee800b000003",
      "deleted": false,
      "countViewer": NumberInt(0)
    },
    {
      "_id": ObjectId("52c75a79471dee4c0b000004"),
      "content": "hello all",
      "status": true,
      "created": ISODate("2014-01-04T00:48:57.0Z"),
      "updated": ISODate("2014-01-04T00:48:57.0Z"),
      "author": "Quang Thi",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "52c75a79471dee4c0b000003",
      "deleted": false,
      "countViewer": NumberInt(0)
    },
    {
      "_id": ObjectId("52cd921f471deebc0a000001"),
      "content": "dfa fsda f",
      "status": true,
      "created": ISODate("2014-01-08T17:59:59.0Z"),
      "updated": ISODate("2014-01-08T18:00:00.0Z"),
      "author": "user2",
      "email": "user2@test.com",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      },
      "slug": "52cd921f471deebc0a000000",
      "deleted": false,
      "countViewer": NumberInt(0)
    },
    {
      "_id": ObjectId("52f91bbb471deea40a000001"),
      "content": "aaaaaaaa",
      "status": true,
      "created": ISODate("2014-02-10T18:34:35.0Z"),
      "updated": ISODate("2014-02-10T18:34:35.0Z"),
      "author": "Quang Thi",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "ownerId": "518f5f43471deeb40900001f",
      "slug": "52f91bbb471deea40a000000",
      "deleted": false,
      "countViewer": NumberInt(0)
    },
    {
      "_id": ObjectId("52f91bd6471deeb40a000008"),
      "content": "bbbbbbbbbbb",
      "status": true,
      "created": ISODate("2014-02-10T18:35:02.0Z"),
      "updated": ISODate("2014-02-10T18:35:02.0Z"),
      "author": "Quang Thi",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "ownerId": "518f5f43471deeb40900001f",
      "slug": "52f91bd6471deeb40a000007",
      "deleted": false,
      "countViewer": NumberInt(0)
    },
    {
      "_id": ObjectId("52f91c1b471dee9c0a000001"),
      "content": "cccccccccccccc",
      "status": true,
      "created": ISODate("2014-02-10T18:36:11.0Z"),
      "updated": ISODate("2014-02-10T18:36:11.0Z"),
      "author": "Quang Thi",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "ownerId": "518f5f43471deeb40900001f",
      "slug": "52f91c1b471dee9c0a000000",
      "deleted": false,
      "countViewer": NumberInt(0)
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
      "_id": ObjectId("52ad218b471dee7809000001"),
      "author": "user2",
      "content": "hello Quang Thi",
      "countViewer": NumberInt(0),
      "created": ISODate("2013-12-15T03:27:07.0Z"),
      "deleted": false,
      "email": "user2@test.com",
      "likerIds": [
        "518f5f43471deeb40900001f",
        "518f5555471deea409000000"
      ],
      "slug": "52ad218b471dee7809000000",
      "status": true,
      "updated": ISODate("2013-12-15T03:27:24.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52ad2551471dee5809000001"),
      "author": "Quang Thi",
      "content": "hello",
      "countViewer": NumberInt(0),
      "created": ISODate("2013-12-15T03:43:13.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5f43471deeb40900001f"
      ],
      "slug": "52ad2551471dee5809000000",
      "status": true,
      "updated": ISODate("2013-12-17T06:49:26.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52ad268c471dee1805000001"),
      "author": "user2",
      "content": "ljlksdjfa",
      "countViewer": NumberInt(0),
      "created": ISODate("2013-12-15T03:48:28.0Z"),
      "deleted": false,
      "email": "user2@test.com",
      "likerIds": [
        "518f5555471deea409000000"
      ],
      "slug": "52ad268c471dee1805000000",
      "status": true,
      "updated": ISODate("2013-12-15T03:48:36.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52ad26a3471dee5c09000001"),
      "author": "user2",
      "content": "hghfghdf",
      "countViewer": NumberInt(0),
      "created": ISODate("2013-12-15T03:48:51.0Z"),
      "deleted": false,
      "email": "user2@test.com",
      "likerIds": [
        "518f5555471deea409000000",
        "518f5f43471deeb40900001f"
      ],
      "slug": "52ad26a2471dee5c09000000",
      "status": true,
      "updated": ISODate("2013-12-17T06:30:57.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52ad32fd471dee3c09000001"),
      "author": "Quang Thi",
      "content": "hello",
      "countViewer": NumberInt(1),
      "created": ISODate("2013-12-15T04:41:33.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5f43471deeb40900001f"
      ],
      "slug": "52ad32fd471dee3c09000000",
      "status": true,
      "updated": ISODate("2013-12-20T06:58:37.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52b3eac0471dee9809000001"),
      "author": "Quang Thi",
      "content": "Hello bé Quế",
      "countViewer": NumberInt(2),
      "created": ISODate("2013-12-20T06:59:12.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "likerIds": [
        "518f5f43471deeb40900001f",
        "5296a817471dee180b000000"
      ],
      "slug": "52b3eac0471dee9809000000",
      "status": true,
      "updated": ISODate("2013-12-20T07:06:30.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52b42ce6471dee8409000001"),
      "content": "abc xxx",
      "status": true,
      "created": ISODate("2013-12-20T11:41:26.0Z"),
      "updated": ISODate("2013-12-20T11:41:26.0Z"),
      "author": "Quang Thi",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "52b42ce6471dee8409000000",
      "thumb": "data\/catalog\/user\/518f5555471deea409000000\/post\/52b42ce6471dee8409000000\/avatar.jpg",
      "deleted": false,
      "countViewer": NumberInt(0)
    },
    {
      "_id": ObjectId("52b42d20471dee9409000001"),
      "author": "Quang Thi",
      "comments": [
        {
          "_id": ObjectId("52b4785b471deea009000004"),
          "author": "user2",
          "content": "hello Quang Thi",
          "created": ISODate("2013-12-20T17:03:23.0Z"),
          "deleted": false,
          "email": "user2@test.com",
          "status": true,
          "updated": ISODate("2013-12-20T17:03:23.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("518f5f43471deeb40900001f"),
            "$db": "yesocl"
          }
        },
        {
          "_id": ObjectId("52c8de18471deed40a000000"),
          "author": "Quang Thi",
          "content": "hello",
          "created": ISODate("2014-01-05T04:22:48.0Z"),
          "deleted": false,
          "email": "quangthi_90@yahoo.com.vn",
          "status": true,
          "updated": ISODate("2014-01-05T04:22:48.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("518f5555471deea409000000"),
            "$db": "yesocl"
          }
        }
      ],
      "content": "fdsaf sdaf sd&lt;br&gt;",
      "countViewer": NumberInt(0),
      "created": ISODate("2013-12-20T11:42:24.0Z"),
      "deleted": false,
      "email": "quangthi_90@yahoo.com.vn",
      "slug": "sdaf-sda-52b42d20471dee9409000000",
      "status": true,
      "title": " sdaf sda",
      "updated": ISODate("2014-01-05T04:22:48.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("52b47177471dee9009000001"),
      "content": "Chứng khoán Việt Nam",
      "status": true,
      "created": ISODate("2013-12-20T16:33:59.0Z"),
      "updated": ISODate("2013-12-20T16:33:59.0Z"),
      "author": "user2",
      "email": "user2@test.com",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      },
      "slug": "52b47177471dee9009000000",
      "deleted": false,
      "countViewer": NumberInt(0)
    },
    {
      "_id": ObjectId("52b473f0471deef80800000b"),
      "content": "Quảng cáo: YesGroup, chuyên tư vấn chứng khoán &amp; đầu tư",
      "status": true,
      "created": ISODate("2013-12-20T16:44:32.0Z"),
      "updated": ISODate("2013-12-20T16:50:43.0Z"),
      "author": "user2",
      "email": "user2@test.com",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      },
      "slug": "52b473f0471deef80800000a",
      "deleted": false,
      "countViewer": NumberInt(1)
    },
    {
      "_id": ObjectId("52f50526471deeb00c000001"),
      "content": "hello new day ^^",
      "status": true,
      "created": ISODate("2014-02-07T16:09:10.0Z"),
      "updated": ISODate("2014-02-07T16:09:10.0Z"),
      "author": "Quang Thi",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "52f50526471deeb00c000000",
      "thumb": "data\/catalog\/user\/518f5555471deea409000000\/post\/52f50526471deeb00c000000\/avatar.png",
      "deleted": false,
      "countViewer": NumberInt(0)
    },
    {
      "_id": ObjectId("52f90f76471deea80a000003"),
      "content": "sfdsdf sdafadssad ",
      "status": true,
      "created": ISODate("2014-02-10T17:42:14.0Z"),
      "updated": ISODate("2014-02-10T17:42:14.0Z"),
      "author": "Quang Thi",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "slug": "52f90f76471deea80a000002",
      "deleted": false,
      "countViewer": NumberInt(0)
    },
    {
      "_id": ObjectId("52f9125e471deea80a000006"),
      "content": "abc xxx",
      "status": true,
      "created": ISODate("2014-02-10T17:54:38.0Z"),
      "updated": ISODate("2014-02-10T17:54:39.0Z"),
      "author": "Quang Thi",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "ownerId": "518f5555471deea409000000",
      "slug": "52f9125e471deea80a000005",
      "deleted": false,
      "countViewer": NumberInt(0)
    },
    {
      "_id": ObjectId("52f912a9471deea80a000009"),
      "content": "abc",
      "status": true,
      "created": ISODate("2014-02-10T17:55:53.0Z"),
      "updated": ISODate("2014-02-10T17:55:53.0Z"),
      "author": "user2",
      "email": "user2@test.com",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      },
      "ownerId": "518f5555471deea409000000",
      "slug": "52f912a9471deea80a000008",
      "deleted": false,
      "countViewer": NumberInt(0)
    },
    {
      "_id": ObjectId("52f9154a471deeb40a000001"),
      "content": "fs afdas fas",
      "status": true,
      "created": ISODate("2014-02-10T18:07:06.0Z"),
      "updated": ISODate("2014-02-10T18:07:06.0Z"),
      "author": "Quang Thi",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "ownerId": "518f5555471deea409000000",
      "slug": "52f9154a471deeb40a000000",
      "deleted": false,
      "countViewer": NumberInt(0)
    },
    {
      "_id": ObjectId("52f91556471deeb40a000004"),
      "content": "f asdf asdfasd",
      "status": true,
      "created": ISODate("2014-02-10T18:07:18.0Z"),
      "updated": ISODate("2014-02-10T18:07:18.0Z"),
      "author": "user2",
      "email": "user2@test.com",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      },
      "ownerId": "518f5555471deea409000000",
      "slug": "52f91556471deeb40a000003",
      "deleted": false,
      "countViewer": NumberInt(0)
    },
    {
      "_id": ObjectId("52f91b99471deeac0a000001"),
      "content": "aaaaaaaaaaaaa",
      "status": true,
      "created": ISODate("2014-02-10T18:34:01.0Z"),
      "updated": ISODate("2014-02-10T18:34:01.0Z"),
      "author": "Quang Thi",
      "email": "quangthi_90@yahoo.com.vn",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      },
      "ownerId": "518f5555471deea409000000",
      "slug": "52f91b99471deeac0a000000",
      "deleted": false,
      "countViewer": NumberInt(0)
    }
  ],
  "user": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  }
});

/** ward records **/
