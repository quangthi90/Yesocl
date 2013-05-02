
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
      "_id": ObjectId("51828071471dee0808000001"),
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
      "_id": ObjectId("51828071471dee0808000002"),
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
      "_id": ObjectId("51828071471dee0808000003"),
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
      "_id": ObjectId("51828071471dee0808000004"),
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
      "_id": ObjectId("51828071471dee0808000005"),
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
      "_id": ObjectId("51828071471dee0808000006"),
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
      "_id": ObjectId("51828071471dee0808000007"),
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
      "_id": ObjectId("51828071471dee0808000008"),
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
      "_id": ObjectId("51828071471dee0808000009"),
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
      "_id": ObjectId("51828071471dee080800000a"),
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
      "_id": ObjectId("51828071471dee080800000b"),
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
      "_id": ObjectId("51828071471dee080800000c"),
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
      "_id": ObjectId("51828071471dee080800000d"),
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
      "_id": ObjectId("51828071471dee080800000e"),
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
      "_id": ObjectId("51828071471dee080800000f"),
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
      "_id": ObjectId("51828071471dee0808000010"),
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
      "_id": ObjectId("51828071471dee0808000011"),
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
      "_id": ObjectId("51828071471dee0808000012"),
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
      "_id": ObjectId("51828071471dee0808000013"),
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
  "_id": ObjectId("516b9622913db4200a000000"),
  "created": ISODate("2013-04-15T05:54:42.0Z"),
  "description": "&lt;p&gt;\r\n\tfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfds&lt;\/p&gt;\r\n",
  "group": {
    "$ref": "company_group",
    "$id": ObjectId("516b9417913db47809000003"),
    "$db": "yesocl"
  },
  "logo": "data\/catalog\/company\/516b9622913db4200a000000\/logo.jpg",
  "name": "IBM",
  "owner": {
    "$ref": "user",
    "$id": ObjectId("516b9398913db43009000001"),
    "$db": "yesocl"
  },
  "posts": [
    
  ],
  "status": true
});
db.getCollection("company").insert({
  "_id": ObjectId("5171f0a9976982140f000015"),
  "created": ISODate("2013-04-20T01:34:33.0Z"),
  "description": "&lt;p&gt;\r\n\tLorem ipsum dolor sit amet, sea eu perpetua constituam, ne pri adipisci invenire. Ei illum feugiat vivendo ius, ne his primis docendi. Sanctus cotidieque usu ea, id soleat vivendum nec, quando intellegebat eos cu.&lt;\/p&gt;\r\n",
  "group": {
    "$ref": "company_group",
    "$id": ObjectId("516b9417913db47809000003"),
    "$db": "yesocl"
  },
  "logo": "data\/catalog\/company\/5171f0a9976982140f000015\/logo.png",
  "name": "Oracle",
  "owner": {
    "$ref": "user",
    "$id": ObjectId("516c9acb976982140f000000"),
    "$db": "yesocl"
  },
  "posts": [
    {
      "_id": ObjectId("5171f0e1976982bc0f00000c"),
      "category": {
        "$ref": "company_post_category",
        "$id": ObjectId("516c9640976982b00c000000"),
        "$db": "yesocl"
      },
      "comments": [
        {
          "_id": ObjectId("5171f3eb976982640e000049"),
          "content": "&lt;p&gt;\r\n\tQui sale summo no, mel mutat nonumes posidonium ne. Ea vidit reque inani quo. Singulis referrentur ut mel, et exerci officiis quaerendum ius.&lt;\/p&gt;\r\n",
          "status": true,
          "created": ISODate("2013-04-20T01:48:27.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("516b9398913db43009000001"),
            "$db": "yesocl"
          }
        },
        {
          "_id": ObjectId("5171f405976982640e00004a"),
          "content": "&lt;p&gt;\r\n\tIn dico accommodare reprehendunt pro. Ipsum appellantur interpretaris ei quo, cu duo vocibus partiendo mediocritatem, usu in option appareat consequat. Alienum legendos interesset ne eum, ad probo propriae duo.&lt;\/p&gt;\r\n",
          "status": true,
          "created": ISODate("2013-04-20T01:48:53.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("516c9acb976982140f000000"),
            "$db": "yesocl"
          }
        }
      ],
      "content": "&lt;p&gt;\r\n\tMei illum nostro id, vix ea option blandit commune. Mutat essent disputationi pri id, eos te solet nominavi iudicabit. No vel esse graece, zril copiosae te sea. Vix an illud eruditi voluptua, ne ius modo eirmod insolens. Singulis volutpat voluptatibus pro cu, integre oblique cu quo, dicta recusabo an eam. Id mel movet fabulas ocurreret, quo no diceret propriae conclusionemque, id delectus eleifend eum.&lt;\/p&gt;\r\n",
      "created": ISODate("2013-04-20T01:35:28.0Z"),
      "description": "&lt;p&gt;\r\n\tQui sale summo no, mel mutat nonumes posidonium ne. Ea vidit reque inani quo. Singulis referrentur ut mel, et exerci officiis quaerendum ius&lt;\/p&gt;\r\n",
      "status": true,
      "thumb": "data\/catalog\/company\/5171f0a9976982140f000015\/post\/5171f0e1976982bc0f00000c\/thumb.png",
      "title": "Sample post",
      "user": {
        "$ref": "user",
        "$id": ObjectId("516b9398913db43009000001"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5171f437976982640e00004b"),
      "category": {
        "$ref": "company_post_category",
        "$id": ObjectId("516c9640976982b00c000000"),
        "$db": "yesocl"
      },
      "content": "&lt;p&gt;\r\n\tMei illum nostro id, vix ea option blandit commune. Mutat essent disputationi pri id, eos te solet nominavi iudicabit. No vel esse graece, zril copiosae te sea. Vix an illud eruditi voluptua, ne ius modo eirmod insolens. Singulis volutpat voluptatibus pro cu, integre oblique cu quo, dicta recusabo an eam. Id mel movet fabulas ocurreret&lt;\/p&gt;\r\n",
      "created": ISODate("2013-04-20T01:49:43.0Z"),
      "description": "&lt;p&gt;\r\n\tMei illum nostro id, vix ea option blandit commune. Mutat essent disputationi pri id, eos te solet nominavi iudicabit. No vel esse graece, zril copiosae te sea.&lt;\/p&gt;\r\n",
      "status": true,
      "thumb": "data\/catalog\/company\/5171f0a9976982140f000015\/post\/5171f437976982640e00004b\/thumb.png",
      "title": "Anoter Sample Post",
      "user": {
        "$ref": "user",
        "$id": ObjectId("516c9acb976982140f000000"),
        "$db": "yesocl"
      }
    }
  ],
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
  "name": "Default",
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

/** data_value records **/
db.getCollection("data_value").insert({
  "_id": ObjectId("514af827913db48c05000014"),
  "name": "Vietnam National University - Ho Chi Minh City",
  "value": "Vietnam National University - Ho Chi Minh City",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af76a913db48c05000010"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514af84e913db48c05000015"),
  "name": "University of Economics Ho Chi Minh City",
  "value": "University of Economics Ho Chi Minh City",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af76a913db48c05000010"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514af88b913db48c05000016"),
  "name": "Vietnam National University - Ha Noi",
  "value": "Vietnam National University - Ha Noi",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af76a913db48c05000010"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514af8f4913db48c05000017"),
  "name": "Master Of Library &amp; Information Science",
  "value": "Master Of Library &amp; Information Science",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af771913db48c05000011"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514af917913db48c05000018"),
  "name": "Master Of Technology",
  "value": "Master Of Technology",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af771913db48c05000011"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514af952913db48c05000019"),
  "name": "Bachelor Of Engineering",
  "value": "Bachelor Of Engineering",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af771913db48c05000011"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514af970913db48c0500001a"),
  "name": "Information Technology",
  "value": "Information Technology",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af7a3913db48c05000013"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514af992913db48c0500001b"),
  "name": "Economics",
  "value": "Economics",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af7a3913db48c05000013"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514af9b3913db48c0500001c"),
  "name": "Accounting",
  "value": "Accounting",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af7a3913db48c05000013"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514b094d913db4ac0800001f"),
  "name": "Banking",
  "value": "Banking",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af77a913db48c05000012"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514b0970913db4ac08000020"),
  "name": "Chemicals",
  "value": "Chemicals",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af77a913db48c05000012"),
    "$db": "yesocl"
  }
});
db.getCollection("data_value").insert({
  "_id": ObjectId("514b0983913db4ac08000021"),
  "name": "Design",
  "value": "Design",
  "type": {
    "$ref": "data_type",
    "$id": ObjectId("514af77a913db48c05000012"),
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
  "_id": ObjectId("516b9398913db43009000001"),
  "created": ISODate("2013-04-15T05:43:52.0Z"),
  "emails": [
    {
      "_id": ObjectId("516b9399913db43009000005"),
      "email": "testemail@gmail.com",
      "primary": true
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("516b4a91913db43009000000"),
    "$db": "yesocl"
  },
  "meta": {
    "_id": ObjectId("516b9398913db43009000002"),
    "firstname": "fdsfdfdsf",
    "lastname": "cxvcxsdf",
    "headingLine": "",
    "location": {
      "_id": ObjectId("516b9398913db43009000003"),
      "countryId": "5143bfa3913db4a408000011",
      "country": "Việt Nam",
      "cityId": "5143bfca913db4a408000012",
      "city": "HCM"
    },
    "postalCode": "12345",
    "industry": "Banking",
    "address": "fdcvsfdsd",
    "background": {
      "_id": ObjectId("516b9398913db43009000004"),
      "interest": "",
      "birthday": ISODate("2013-04-11T22:00:00.0Z"),
      "maritalStatus": false,
      "adviceForContact": ""
    }
  },
  "password": "6d7f099cc22b4501e2bbb04094404b9f454554cc",
  "status": true,
  "username": "tester"
});
db.getCollection("user").insert({
  "_id": ObjectId("516c9acb976982140f000000"),
  "created": ISODate("2013-04-16T00:26:51.0Z"),
  "emails": [
    {
      "_id": ObjectId("516c9acb976982140f000004"),
      "email": "hughnjt@gmail.com",
      "primary": true
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("516b4a91913db43009000000"),
    "$db": "yesocl"
  },
  "meta": {
    "_id": ObjectId("516c9acb976982140f000001"),
    "firstname": "hyujikmnhj",
    "lastname": "gtfhyvbg",
    "headingLine": "",
    "location": {
      "_id": ObjectId("516c9acb976982140f000002"),
      "countryId": "5143bfa3913db4a408000011",
      "country": "Việt Nam",
      "cityId": "5143bfca913db4a408000012",
      "city": "HCM"
    },
    "postalCode": "12345",
    "industry": "Banking",
    "address": "kijmnjhuk",
    "background": {
      "_id": ObjectId("516c9acb976982140f000003"),
      "interest": "",
      "birthday": ISODate("2013-04-11T22:00:00.0Z"),
      "maritalStatus": false,
      "adviceForContact": ""
    }
  },
  "password": "8310f3c06e6bd007b6ad653cae8726f70284fe8f",
  "status": true,
  "username": "abcdef"
});

/** user_group records **/
db.getCollection("user_group").insert({
  "_id": ObjectId("516b4a91913db43009000000"),
  "name": "Default"
});

/** ward records **/
