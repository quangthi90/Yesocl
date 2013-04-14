
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
      "_id": ObjectId("516a6348471dee480b00000a"),
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
      "_id": ObjectId("516a6348471dee480b00000b"),
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
      "_id": ObjectId("516a6348471dee480b00000c"),
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
      "_id": ObjectId("516a6348471dee480b00000d"),
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
      "_id": ObjectId("516a6348471dee480b00000e"),
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
      "_id": ObjectId("516a6348471dee480b00000f"),
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

/** user_group records **/

/** ward records **/
