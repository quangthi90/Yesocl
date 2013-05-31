
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
      "_id": ObjectId("518f5c8f471deeb409000000"),
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
      "_id": ObjectId("518f5c8f471deeb409000001"),
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
      "_id": ObjectId("518f5c8f471deeb409000002"),
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
      "_id": ObjectId("518f5c8f471deeb409000003"),
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
      "_id": ObjectId("518f5c8f471deeb409000004"),
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
      "_id": ObjectId("518f5c8f471deeb409000005"),
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
      "_id": ObjectId("518f5c8f471deeb409000006"),
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
      "_id": ObjectId("518f5c8f471deeb409000007"),
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
      "_id": ObjectId("518f5c8f471deeb409000008"),
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
      "_id": ObjectId("518f5c8f471deeb409000009"),
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
      "_id": ObjectId("518f5c8f471deeb40900000a"),
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
      "_id": ObjectId("518f5c8f471deeb40900000b"),
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
      "_id": ObjectId("518f5c8f471deeb40900000c"),
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
      "_id": ObjectId("518f5c8f471deeb40900000d"),
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
      "_id": ObjectId("518f5c8f471deeb40900000e"),
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
      "_id": ObjectId("518f5c8f471deeb40900000f"),
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
      "_id": ObjectId("518f5c8f471deeb409000010"),
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
      "_id": ObjectId("518f5c8f471deeb409000011"),
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
      "_id": ObjectId("518f5c8f471deeb409000012"),
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
      "_id": ObjectId("518f5c8f471deeb409000013"),
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

/** city records **/
db.getCollection("city").insert({
  "_id": ObjectId("5143bfca913db4a408000012"),
  "name": "HCM",
  "status": true,
  "country": {
    "$ref": "country",
    "$id": ObjectId("5143bfa3913db4a408000011"),
    "$db": "yesocl"
  }
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
      "_id": ObjectId("51a79d10471dee9c09000005"),
      "author": "user2",
      "category": {
        "$ref": "company_post_category",
        "$id": ObjectId("516c9640976982b00c000000"),
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
        }
      ],
      "content": "&lt;p&gt;\r\n\tDòng tiền đầu cơ tiếp tục đổ vào thị trường sau những diễn biến tích cực, cùng với đó tâm lý của nhà đầu tư cũng ổn định hơn tại một số thời điểm thị trường điều chỉnh khi không xuất hiện áp lực bán tháo. Tuy nhiên,&amp;nbsp;áp lực chốt lời đã nhanh chóng gia tăng trở lại khiến thị trường mất dần sự hưng phấn. Lực bán &amp;nbsp;tập trung chủ yếu ở nhóm cổ phiếu lớn và &amp;nbsp;đầu cơ, những cổ phiếu đã có mức tăng trưởng mạnh trong thời gian qua như REE, PPC, DRC, VNM, GAS…&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm ngắn hạn (5-10 ngày):&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tVề mặt kỹ thuật, Vnindex hình thành hai cây nến gần đây luôn tạo bóng trên ở ngưỡng 518 cho thấy lực bán khá mạnh tập trung &amp;nbsp;ở vùng này và theo đó, nhịp điều chỉnh sắp tới có thể xảy ra đưa VNIndex về vùng hỗ trợ 500-505 điểm. Trong khi đó, chỉ số&amp;nbsp;HNXIndex cũng yếu dần về cuối phiên cho thấy dấu hiệu tiêu cực với việc hình thành mô hình nến Shooting Star cùng khối lượng giao dịch lớn.&amp;nbsp;Tương ứng với mức 500 điểm của VNIndex, mục tiêu của HNX là vùng hỗ trợ &amp;nbsp;63-62.5.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/vnindex11.jpg&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-2718&quot; height=&quot;400&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/vnindex11-1024x453.jpg&quot; style=&quot;border: 1px solid black;&quot; title=&quot;vnindex&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/hnxindfex.jpg&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-2719&quot; height=&quot;400&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/hnxindfex-1024x453.jpg&quot; style=&quot;border: 1px solid black;&quot; title=&quot;hnxindfex&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&amp;nbsp;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Chiến lược giao dịch ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;ul&gt;\r\n\t&lt;li&gt;\r\n\t\tỞ vị thế mua, chúng&amp;nbsp;tôi không ủng hộ việc mua đuổi trong phiên (đặc việt là nhóm cổ phiếu đã tăng mạnh)&amp;nbsp;&amp;nbsp;mà nên cân nhắc mua vào ở các nhịp điều chỉnh về vùng hỗ trợ trong phiên cuối tuần.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tDanh mục giải ngân có thể tập trung vào các cổ phiếu đang tích lũy hoặc chưa tăng mạnh trong thời gian qua.&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n",
      "created": ISODate("2013-05-30T18:40:16.0Z"),
      "description": "&lt;p&gt;\r\n\tDòng tiền đầu cơ tiếp tục đổ vào thị trường sau những diễn biến tích cực&lt;\/p&gt;\r\n",
      "email": "user2@test.com",
      "slug": "lang-kinh-yestoc-phien-3005-ap-luc-ban-co-the-se-gia-tang-51a79d10471dee9c09000004",
      "status": true,
      "thumb": "data\/catalog\/company\/519d1163471deee40b000000\/post\/51a79d10471dee9c09000005\/thumb.jpg",
      "title": "Lăng kính Yestoc phiên 30\/05: “áp lực bán có thể sẽ gia tăng”",
      "updated": ISODate("2013-05-30T18:45:51.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("51a8b58d471dee2809000001"),
      "author": "user1",
      "category": {
        "$ref": "company_post_category",
        "$id": ObjectId("516c9640976982b00c000000"),
        "$db": "yesocl"
      },
      "content": "&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n\tHiện tại, 2 chỉ số đang tiếp cận các vùng kháng cự 505-510 và 62,5-63 , điều này được thể hiện rõ nét trong các phiên cuối tuần, tuy nhiên, thanh khoản giao dịch vẫn duy trì được ở mức cao.&amp;nbsp;Nhìn chung, diễn&amp;nbsp;biến trong thị trường trong tuần vừa qua rất tích cực khi VNIndex vượt vùng cản 490 , HNX vượt vùng cản 61 như chúng tôi đã dự đoán.&amp;nbsp;Các cổ phiếu midcap vẫn đang là điểm đến của dòng tiền thông minh, cùng với đó là một bộ phận nhà đầu tư đã bắt đầu mua vào nhóm cổ phiếu đầu cơ với kỳ vọng về một nhịp tăng trưởng mới của chỉ số.&lt;\/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;strong&gt;Quan điểm ngắn hạn ( 5-10 ngày):&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n\tNhững cây nến xanh biên độ lớn xuất hiện ngày càng nhiều cho thấy tâm lý nhà đầu tư được cải thiện theo chiều hướng tích cực khi giá đã phá vỡ hoàn toàn vùng kháng cự mạnh 490. Tuy nhiên, về cuối tuần áp lực chốt lời càng mạnh khiến thị trường điều chỉnh nhẹ. Việc rung lắc trong phiên dự đoán sẽ còn xuất hiện trong thời gian tới khi cả hai chỉ số vừa phá vỡ ngưỡng kháng cự quan trọng.&amp;nbsp;Kịch bản nhiều khả năng nhất là thị trường sẽ tạm thời dao động trong khung 491-510 trên Vnindex và 61-63 trên Hnx. Với kịch bản dao động như vậy thì nhà đầu tư vẫn có thể cân nhắc mua vào tại các thời điểm điều chỉnh của thị trường.&lt;\/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;strong&gt;Quan điểm trung hạn (1 – 3 tháng):&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\tTheo đồ thị tuần, xu hướng trung hạn đang trong giai đoạn xác nhận xu hướng tăng và cần phải quan sát thêm. Nếu mức độ điều chỉnh không quá mạnh dưới mức 491 của chỉ số VNIndex và mức 61.0 của chỉ số HNX trong những phiên tới cũng như thanh khoản tiếp tục duy trì tăng ồn định thì việc mua tích lũy có thể được cân nhắc.&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;strong&gt;Chiến lược trade ngắn hạn:&lt;\/strong&gt;&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;ul&gt;\r\n\t\t&lt;li&gt;\r\n\t\t\tNhà đầu tư tránh mua đuổi giá cao (nếu có) trong phiên đầu tuần, đặc biệt là trong các phiên hồi phục mạnh khi chỉ số tiệm cận các ngưỡng cản trung và dài hạn.&lt;\/li&gt;\r\n\t\t&lt;li&gt;\r\n\t\t\tThị trường sẽ sớm chịu áp lực điều chỉnh tại vùng 500-510 và 62.5, do đó&amp;nbsp;nhà đầu tư có thể xem xét gia tăng tỷ lệ nắm giữ cổ phiếu khi thị trường điều chỉnh giảm tại mốc hỗ trợ.&lt;\/li&gt;\r\n\t\t&lt;li&gt;\r\n\t\t\tĐiểm cắt lỗ có thể cân nhắc đặt tại vùng 491 và 59, tương ứng cho VNIndex và HNX nếu thị trường giảm mạnh.&lt;\/li&gt;\r\n\t\t&lt;li&gt;\r\n\t\t\tDanh mục tập trung vào các mã lực cầu mạnh như :&lt;\/li&gt;\r\n\t&lt;\/ul&gt;\r\n\t&lt;ol&gt;\r\n\t\t&lt;li&gt;\r\n\t\t\tCổ&amp;nbsp;phiếu cơ bản : PVC, CSM, PVD, FPT,&amp;nbsp;REE, DRC, PET, VSH, GAS, VNM&lt;\/li&gt;\r\n\t\t&lt;li&gt;\r\n\t\t\tCổ&amp;nbsp;phiếu đầu cơ: SHB, KLS, SCR, SSI, VND, TPP, IJC, TDC&lt;\/li&gt;\r\n\t&lt;\/ol&gt;\r\n\t&lt;p&gt;\r\n\t\t&lt;strong&gt;Một vài mã tiêu biểu:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;strong&gt;CSM__Mua: 35-37__Bán: 40__Cutloss: &amp;lt;34&lt;\/strong&gt;&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/csm.jpg&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-2660&quot; height=&quot;400&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/csm-1024x453.jpg&quot; style=&quot;border: 1px solid black;&quot; title=&quot;csm&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;strong&gt;PVD__Mua: 43-45__Bán:&amp;nbsp;&lt;strong&gt;50__Cutloss: &amp;lt;43&lt;\/strong&gt;&lt;\/strong&gt;&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/pvd.jpg&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-2663&quot; height=&quot;400&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/pvd-1024x453.jpg&quot; style=&quot;border: 1px solid black;&quot; title=&quot;pvd&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;strong&gt;VIC__Mua: 64-65__Bán: 7&lt;\/strong&gt;&lt;strong&gt;0__Cutloss: &amp;lt;63&lt;\/strong&gt;&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;strong&gt;&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/VIC.jpg&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-2665&quot; height=&quot;400&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/VIC-1024x453.jpg&quot; style=&quot;border: 1px solid black;&quot; title=&quot;VIC&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/strong&gt;&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;strong&gt;SHB__Mua: 7.0-7.2__Bán: 7.7-8__Cutloss: &amp;lt;7&lt;\/strong&gt;&lt;\/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/shb.jpg&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;wp-image-2664&quot; height=&quot;400&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/shb-1024x453.jpg&quot; style=&quot;border: 1px solid black;&quot; title=&quot;shb&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/div&gt;\r\n",
      "created": ISODate("2013-05-31T14:37:01.0Z"),
      "description": "&lt;p&gt;\r\n\tHiện tại, 2 chỉ số đang tiếp cận các vùng kháng cự 505-510 và 62,5-63 , điều này được thể hiện rõ nét trong các phiên cuối tuần&lt;\/p&gt;\r\n",
      "email": "user1@test.com",
      "slug": "lang-kinh-yestoc-tuan-27-3105-tam-thoi-di-ngang-va-dieu-chinh-trong-tuan-51a8b58d471dee2809000000",
      "status": true,
      "thumb": "data\/catalog\/company\/519d1163471deee40b000000\/post\/51a8b58d471dee2809000001\/thumb.jpg",
      "title": "Lăng kính Yestoc tuần 27-31\/05: ” Tạm thời đi ngang và điều chỉnh trong tuần”",
      "updated": ISODate("2013-05-31T14:37:01.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5555471deea409000000"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("51a8b787471dee1009000001"),
      "author": "user2",
      "category": {
        "$ref": "company_post_category",
        "$id": ObjectId("516c9640976982b00c000000"),
        "$db": "yesocl"
      },
      "content": "&lt;p&gt;\r\n\tDiễn biến các chỉ số qua tiếp tục cho thấy sự tích cực trong xu hướng trung hạn, nhóm chứng khoán dậy sóng giúp thị trường có phiên tăng điểm mạnh mẽ. Tuy nhiên trong ngắn hạn, áp lực bán có thể gia tăng do VNIndex đang tiệm cận đỉnh đầu năm ở 518 trong khi &amp;nbsp;chỉ số HNX đóng cửa trên kháng cự 63,3 nhưng mức vượt qua khá nhỏ nên sự phá vỡ chưa rõ ràng&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Quan điểm ngắn hạn (5-10 ngày)&lt;\/strong&gt;:&lt;\/p&gt;\r\n&lt;p&gt;\r\n\tChúng tôi tiếp tục giữ quan điểm thị trường vẫn có thể có vài phiên điều chỉnh nhẹ về gần các mức hỗ trợ 500 trên Vnindex và 61 trên HNX trong tuần sau. Hai chỉ số vẫn hoạt động trong kênh tăng giá hẹp ngắn hạn với mức mục tiêu của nhịp tăng lần này là 520 của VN-Index và 65 của HNX. Do đó, các nhà đầu tư có thể tận dụng các nhịp điều chỉnh nhẹ về gần các mức hỗ trợ mới để tham gia giải ngân vào các mã vẫn đang ở trạng thái tích lũy hoặc chưa tăng mạnh, nhưng hạn chế giải ngân vào các cổ phiếu đã có mức tăng nóng như BTP, REE, PPC, HSG… trong thời gian qua vì chúng tôi quan ngại khả năng áp lực chốt lời có thể sẽ gia tăng mạnh lên nhóm cổ phiếu này trong các phiên tới.&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;a href=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/vnidex.png&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; class=&quot;alignleft  wp-image-2704&quot; height=&quot;0&quot; src=&quot;http:\/\/yestoc.com\/wp-content\/uploads\/2013\/05\/vnidex-1024x583.png&quot; style=&quot;border: 1px solid black;&quot; title=&quot;vnidex&quot; width=&quot;600&quot; \/&gt;&lt;\/a&gt;&lt;\/p&gt;\r\n&lt;p&gt;\r\n\t&lt;strong&gt;Chiến lược trade ngắn hạn:&lt;\/strong&gt;&lt;\/p&gt;\r\n&lt;ul&gt;\r\n\t&lt;li&gt;\r\n\t\tRủi ro đang dần gia tăng khi mà cả hai chỉ số đều tiệm cận ngưỡng kháng cự nên nhà đầu tư tránh việc mua đuổi ở những phiên tăng mạnh.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tNhà đầu tư có thể duy việc giải ngân khi thị trường điều chỉnh và tránh việc lướt sóng ngắn hạn.&lt;\/li&gt;\r\n\t&lt;li&gt;\r\n\t\tDanh mục mã cổ phiếu đã được chúng tôi cập nhật trong &lt;a href=&quot;http:\/\/yestoc.com\/lang-kinh-yestoc-tuan-27-3105-tam-thoi-di-ngang-va-dieu-chinh-trong-tuan\/&quot;&gt;bản tin tuần 27-31\/5&lt;\/a&gt;&lt;\/li&gt;\r\n&lt;\/ul&gt;\r\n",
      "created": ISODate("2013-05-31T14:45:27.0Z"),
      "description": "&lt;p&gt;\r\n\tDiễn biến các chỉ số qua tiếp tục cho thấy sự tích cực trong xu hướng trung hạn, nhóm chứng khoán dậy sóng giúp thị trường có phiên tăng điểm&lt;\/p&gt;\r\n",
      "email": "user2@test.com",
      "slug": "lang-kinh-yestoc-2805-han-che-mua-duoi-51a8b787471dee1009000000",
      "status": true,
      "thumb": "data\/catalog\/company\/519d1163471deee40b000000\/post\/51a8b787471dee1009000001\/thumb.jpg",
      "title": "Lăng kính Yestoc 28\/05: “hạn chế mua đuổi”",
      "updated": ISODate("2013-05-31T14:45:27.0Z"),
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      }
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
  "order": NumberInt(1),
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
  "order": NumberInt(1)
});
db.getCollection("design_action").insert({
  "_id": ObjectId("516a624b471dee3c0b000002"),
  "name": "Edit",
  "code": "edit",
  "order": NumberInt(3)
});
db.getCollection("design_action").insert({
  "_id": ObjectId("516a6295471dee480b000004"),
  "name": "Insert",
  "code": "insert",
  "order": NumberInt(2)
});
db.getCollection("design_action").insert({
  "_id": ObjectId("516a62b2471dee480b000006"),
  "name": "Delete",
  "code": "delete",
  "order": NumberInt(4)
});
db.getCollection("design_action").insert({
  "_id": ObjectId("516a62f0471dee480b000008"),
  "name": "Change Password",
  "code": "change_password",
  "order": NumberInt(5)
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
  "_id": ObjectId("518f5e6d471dee140a000000"),
  "author": {
    "$ref": "user",
    "$id": ObjectId("518f5555471deea409000000"),
    "$db": "yesocl"
  },
  "created": ISODate("2013-05-12T09:18:36.0Z"),
  "description": "&lt;p&gt;\r\n\tEu nobis prompta menandri nam, aliquando reprimique pri eu, omnis legere cu vix. Ex pro liber postea, ad verear omnesque accusamus eam. Eam an inciderint consectetuer. Recusabo assueverit ad pri, nec alia facilisi ea. Minimum convenire est no, has eu case probo incorrupte. Ut nec wisi paulo efficiantur.&lt;\/p&gt;\r\n",
  "name": "Yesocl Group",
  "posts": [
    {
      "_id": ObjectId("518f5f67471deeb40900002a"),
      "comments": [
        {
          "_id": ObjectId("518f600c471dee240a000001"),
          "content": "Dolorem scribentur concludaturque id mel, consequuntur voluptatibus vis no. Ei habemus atomorum imperdiet mel.\r\n",
          "status": true,
          "created": ISODate("2013-05-12T09:25:32.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("518f5555471deea409000000"),
            "$db": "yesocl"
          }
        }
      ],
      "content": "&lt;p&gt;\r\n\tNe pri mazim dolore debitis. Nihil signiferumque mei id. Cu diam nemore repudiandae sit, eu ius dolor assueverit. Pertinacia constituam ei vis, dolorem contentiones eam no. Ne quot nemore his, nusquam persecuti ut vim.&lt;\/p&gt;\r\n",
      "created": ISODate("2013-05-12T09:22:47.0Z"),
      "status": true,
      "title": "Tollit oportere usu ex, mea doming vidisse necessitatibus eu",
      "user": {
        "$ref": "user",
        "$id": ObjectId("518f5f43471deeb40900001f"),
        "$db": "yesocl"
      }
    }
  ],
  "status": true,
  "sumary": "&lt;p&gt;\r\n\tEi timeam dissentias consectetuer has. Meis impetus abhorreant ad quo, id indoctum liberavisse vim. Vis copiosae singulis ut. Est solum dissentias cu, per labitur meliore scribentur ne, debitis detraxit cu est. Docendi gubergren referrentur sit te, at sale ignota habemus vel.&lt;\/p&gt;\r\n",
  "type": {
    "$ref": "group_type",
    "$id": ObjectId("518f5e39471deeb40900001e"),
    "$db": "yesocl"
  },
  "website": "www.yesocl.com"
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
      "_id": ObjectId("51a1cc2b471dee1c0c00001d"),
      "email": "user1@test.com",
      "primary": true
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("516b4a91913db43009000000"),
    "$db": "yesocl"
  },
  "meta": {
    "_id": ObjectId("51a1cc2b471dee1c0c000014"),
    "firstname": "user1",
    "lastname": "yesocl",
    "birthday": ISODate("2013-05-26T08:47:39.0Z"),
    "sex": NumberInt(1),
    "headingLine": "",
    "location": {
      "_id": ObjectId("51a1cc2b471dee1c0c000015"),
      "location": "HCM, Việt Nam",
      "cityId": "5143bfca913db4a408000012"
    },
    "postalCode": "84",
    "industry": "Chemicals",
    "industry_id": "514b0970913db4ac08000020",
    "address": "129\/6\/5 Lê Văn Thọ F11 Gò Vấp",
    "ims": [
      {
        "_id": ObjectId("51a1cc2b471dee1c0c000016"),
        "im": "user1",
        "type": "skype",
        "visible": "myfollow"
      }
    ],
    "phones": [
      {
        "_id": ObjectId("51a1cc2b471dee1c0c000017"),
        "phone": "0903000333",
        "type": "mobile",
        "visible": "myfollow"
      }
    ],
    "websites": [
      {
        "_id": ObjectId("51a1cc2b471dee1c0c000018"),
        "url": "www.yesocl.com",
        "title": ""
      }
    ],
    "background": {
      "_id": ObjectId("51a1cc2b471dee1c0c000019"),
      "experiencies": [
        {
          "_id": ObjectId("51a1cc2b471dee1c0c00001a"),
          "company": "Yesocl",
          "title": "My Company",
          "location": {
            "_id": ObjectId("51a1cc2b471dee1c0c00001b"),
            "location": "HCM, Việt Nam",
            "cityId": "5143bfca913db4a408000012"
          },
          "started": ISODate("2013-01-01T09:47:39.0Z"),
          "ended": ISODate("2013-01-01T09:47:39.0Z"),
          "current": false,
          "description": "Lorem ipsum dolor sit amet, nec in corpora dignissim, nam ea agam zril electram, aperiam vulputate eam ne. Id scaevola mandamus delicatissimi mel, ei prompta nusquam nec. At ferri ridens nam, quo reque expetendis contentiones ut. Mazim aperiri te per, cum adhuc summo in."
        }
      ],
      "educations": [
        {
          "_id": ObjectId("51a1cc2b471dee1c0c00001c"),
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
    "sex": NumberInt(1),
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
