
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
  "password": "e7635b4295971585ea917b30178ec3325d7629e3",
  "salt": "c11783bb6",
  "status": true,
  "username": "admin"
});

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

/** system.indexes records **/
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "yesocl.admin",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "yesocl.admin_group",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "yesocl.design_action",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "yesocl.design_layout",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "yesocl.attribute",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "yesocl.attribute_group",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "yesocl.attribute_type",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "yesocl.city",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "yesocl.country",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "yesocl.data_type",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "yesocl.data_value",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "yesocl.district",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "yesocl.street",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "yesocl.user_group",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "yesocl.ward",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "yesocl.user",
  "name": "_id_"
});

/** system.profile records **/
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:55:21.183Z"),
  "op": "command",
  "ns": "yesocl.$cmd",
  "command": {
    "count": "system.profile",
    "query": [
      
    ]
  },
  "ntoreturn": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(32),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(4),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(48),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:55:21.183Z"),
  "op": "query",
  "ns": "yesocl.system.profile",
  "query": {
    "$query": [
      
    ],
    "$orderby": {
      "ts": NumberInt(-1)
    }
  },
  "ntoreturn": NumberInt(10),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(1),
  "scanAndOrder": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(137),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(1)
    }
  },
  "nreturned": NumberInt(1),
  "responseLength": NumberInt(344),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:55:27.17Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f387c471dee8c0b000000")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(69),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(7),
      "w": NumberLong(4)
    }
  },
  "responseLength": NumberInt(168),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:55:27.33Z"),
  "op": "command",
  "ns": "yesocl.$cmd",
  "command": {
    "count": "admin_group",
    "query": {
      "permissions.layout._id": ObjectId("515f387c471dee8c0b000000")
    }
  },
  "ntoreturn": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(144),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(48),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:55:30.325Z"),
  "op": "command",
  "ns": "yesocl.$cmd",
  "command": {
    "count": "system.profile",
    "query": [
      
    ]
  },
  "ntoreturn": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(43),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(4)
    }
  },
  "responseLength": NumberInt(48),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:55:30.325Z"),
  "op": "query",
  "ns": "yesocl.system.profile",
  "query": {
    "$query": [
      
    ],
    "$orderby": {
      "ts": NumberInt(-1)
    }
  },
  "ntoreturn": NumberInt(10),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(5),
  "scanAndOrder": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(198),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(3),
      "w": NumberLong(2)
    }
  },
  "nreturned": NumberInt(5),
  "responseLength": NumberInt(1727),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:55:33.991Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(149),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(2),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:56:34.4Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(71),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:57:34.17Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(69),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:58:34.31Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(68),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(2)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:59:34.44Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(71),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:59:39.925Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f387c471dee8c0b000000")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(109),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(168),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:59:39.925Z"),
  "op": "command",
  "ns": "yesocl.$cmd",
  "command": {
    "count": "admin_group",
    "query": [
      
    ]
  },
  "ntoreturn": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(110),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(48),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:59:48.256Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f387c471dee8c0b000000")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(64),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(168),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:59:48.271Z"),
  "op": "query",
  "ns": "yesocl.admin_group",
  "query": [
    
  ],
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(2),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(100),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(2),
  "responseLength": NumberInt(2595),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:59:48.287Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f387c471dee8c0b000000")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(54),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(7),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(168),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:59:48.287Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f03ef471deeac1f000000")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(34),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(361),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:59:48.287Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f03ff471deeac1f000001")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(25),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(3),
      "w": NumberLong(2)
    }
  },
  "responseLength": NumberInt(360),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:59:48.287Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f04d5471deeac1f000004")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(24),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(3),
      "w": NumberLong(2)
    }
  },
  "responseLength": NumberInt(364),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:59:48.287Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f0568471deeac1f000005")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(24),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(3),
      "w": NumberLong(2)
    }
  },
  "responseLength": NumberInt(364),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:59:48.302Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f0416471deeac1f000002")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(25),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(3),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(358),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:59:48.302Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f042b471deeac1f000003")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(27),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(3),
      "w": NumberLong(2)
    }
  },
  "responseLength": NumberInt(423),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:59:48.302Z"),
  "op": "update",
  "ns": "yesocl.admin_group",
  "query": {
    "_id": ObjectId("515f3887471dee8c0b000001")
  },
  "updateobj": {
    "$unset": {
      "permissions.0": true
    }
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(169)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(7)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:59:48.302Z"),
  "op": "update",
  "ns": "yesocl.admin_group",
  "query": {
    "_id": ObjectId("515f3887471dee8c0b000001")
  },
  "updateobj": {
    "$pull": {
      "permissions": null
    }
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(81)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(5)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:59:48.302Z"),
  "op": "remove",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f387c471dee8c0b000000")
  },
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(101)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(5)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:59:49.535Z"),
  "op": "command",
  "ns": "yesocl.$cmd",
  "command": {
    "count": "design_layout",
    "query": [
      
    ]
  },
  "ntoreturn": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(144),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(48),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T20:59:49.550Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "$query": [
      
    ],
    "$orderby": {
      "path": NumberInt(0)
    }
  },
  "ntoreturn": NumberInt(10),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(7),
  "scanAndOrder": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(171),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(1)
    }
  },
  "nreturned": NumberInt(7),
  "responseLength": NumberInt(2276),
  "millis": NumberInt(15),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:00.455Z"),
  "op": "query",
  "ns": "yesocl.admin_group",
  "query": {
    "_id": ObjectId("515f3887471dee8c0b000001")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(54),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(4),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(79),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:15.743Z"),
  "op": "query",
  "ns": "yesocl.admin_group",
  "query": {
    "_id": ObjectId("515f3887471dee8c0b000001")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(76),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(79),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:15.758Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "$query": [
      
    ],
    "$orderby": {
      "path": NumberInt(0)
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(7),
  "scanAndOrder": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(190),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(7),
  "responseLength": NumberInt(2276),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:15.821Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": {
      "_id": {
        "$in": [
          ObjectId("515bad7e471deee40e000000"),
          ObjectId("515bae15471deed805000001"),
          ObjectId("515bae1f471deed805000002"),
          ObjectId("515bae2c471deed805000003")
        ]
      }
    },
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(4),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(268),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(4)
    }
  },
  "nreturned": NumberInt(4),
  "responseLength": NumberInt(280),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:15.836Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": {
      "_id": {
        "$in": [
          ObjectId("515f37ac471dee940b000003")
        ]
      }
    },
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(219),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(4)
    }
  },
  "nreturned": NumberInt(1),
  "responseLength": NumberInt(81),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:15.836Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": {
      "_id": {
        "$in": [
          ObjectId("515bae43471deed805000004")
        ]
      }
    },
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(133),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(3),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(1),
  "responseLength": NumberInt(105),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:21.16Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "$query": [
      
    ],
    "$orderby": {
      "path": NumberInt(0)
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(7),
  "scanAndOrder": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(332),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(7),
  "responseLength": NumberInt(2276),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:21.31Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": [
      
    ],
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(6),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(98),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(6),
  "responseLength": NumberInt(426),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:29.564Z"),
  "op": "insert",
  "ns": "yesocl.design_layout",
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(613)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(11)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:30.781Z"),
  "op": "command",
  "ns": "yesocl.$cmd",
  "command": {
    "count": "design_layout",
    "query": [
      
    ]
  },
  "ntoreturn": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(29),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(4),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(48),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:30.781Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "$query": [
      
    ],
    "$orderby": {
      "path": NumberInt(0)
    }
  },
  "ntoreturn": NumberInt(10),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(8),
  "scanAndOrder": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(146),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(1)
    }
  },
  "nreturned": NumberInt(8),
  "responseLength": NumberInt(2347),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:31.998Z"),
  "op": "query",
  "ns": "yesocl.admin_group",
  "query": {
    "_id": ObjectId("515f3887471dee8c0b000001")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(81),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(4)
    }
  },
  "responseLength": NumberInt(79),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:32.29Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "$query": [
      
    ],
    "$orderby": {
      "path": NumberInt(0)
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(8),
  "scanAndOrder": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(198),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(8),
  "responseLength": NumberInt(2347),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:32.29Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": {
      "_id": {
        "$in": [
          ObjectId("515bad7e471deee40e000000"),
          ObjectId("515bae15471deed805000001"),
          ObjectId("515bae1f471deed805000002"),
          ObjectId("515bae2c471deed805000003")
        ]
      }
    },
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(4),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(206),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(4),
  "responseLength": NumberInt(280),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:32.45Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": {
      "_id": {
        "$in": [
          ObjectId("515f37ac471dee940b000003")
        ]
      }
    },
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(172),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(1),
  "responseLength": NumberInt(81),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:32.45Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": {
      "_id": {
        "$in": [
          ObjectId("515bae43471deed805000004")
        ]
      }
    },
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(129),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(2),
      "w": NumberLong(1)
    }
  },
  "nreturned": NumberInt(1),
  "responseLength": NumberInt(105),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:34.57Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(105),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(4)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:37.786Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f3b6d471dee940b000004")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(78),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(7),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(91),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:37.801Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "$query": [
      
    ],
    "$orderby": {
      "path": NumberInt(0)
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(8),
  "scanAndOrder": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(188),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(8),
  "responseLength": NumberInt(2347),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:37.801Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": [
      
    ],
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(6),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(129),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(2)
    }
  },
  "nreturned": NumberInt(6),
  "responseLength": NumberInt(426),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:43.573Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f3b6d471dee940b000004")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(79),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(4)
    }
  },
  "responseLength": NumberInt(91),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:43.573Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "_id": ObjectId("515bae43471deed805000004")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(76),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(4),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(105),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:43.589Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "_id": ObjectId("515f37ac471dee940b000003")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(34),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(4),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(81),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:43.589Z"),
  "op": "update",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f3b6d471dee940b000004")
  },
  "updateobj": {
    "$unset": {
      "actions": true
    }
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(43)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(3)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:43.589Z"),
  "op": "update",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f3b6d471dee940b000004")
  },
  "updateobj": {
    "$pushAll": {
      "actions": [
        {
          "$ref": "design_action",
          "$id": ObjectId("515bae43471deed805000004"),
          "$db": "yesocl"
        },
        {
          "$ref": "design_action",
          "$id": ObjectId("515f37ac471dee940b000003"),
          "$db": "yesocl"
        }
      ]
    }
  },
  "idhack": true,
  "moved": true,
  "nmoved": NumberInt(1),
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(99)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(2)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:44.821Z"),
  "op": "command",
  "ns": "yesocl.$cmd",
  "command": {
    "count": "design_layout",
    "query": [
      
    ]
  },
  "ntoreturn": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(34),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(4),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(48),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:44.821Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "$query": [
      
    ],
    "$orderby": {
      "path": NumberInt(0)
    }
  },
  "ntoreturn": NumberInt(10),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(8),
  "scanAndOrder": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(188),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(2),
      "w": NumberLong(1)
    }
  },
  "nreturned": NumberInt(8),
  "responseLength": NumberInt(2491),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:46.709Z"),
  "op": "query",
  "ns": "yesocl.admin_group",
  "query": {
    "_id": ObjectId("515f3887471dee8c0b000001")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(72),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(79),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:46.724Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "$query": [
      
    ],
    "$orderby": {
      "path": NumberInt(0)
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(8),
  "scanAndOrder": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(191),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(8),
  "responseLength": NumberInt(2491),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:46.740Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": {
      "_id": {
        "$in": [
          ObjectId("515bad7e471deee40e000000"),
          ObjectId("515bae15471deed805000001"),
          ObjectId("515bae1f471deed805000002"),
          ObjectId("515bae2c471deed805000003")
        ]
      }
    },
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(4),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(208),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(4),
  "responseLength": NumberInt(280),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:46.802Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": {
      "_id": {
        "$in": [
          ObjectId("515f37ac471dee940b000003")
        ]
      }
    },
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(224),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(4)
    }
  },
  "nreturned": NumberInt(1),
  "responseLength": NumberInt(81),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:46.802Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": {
      "_id": {
        "$in": [
          ObjectId("515bae43471deed805000004")
        ]
      }
    },
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(130),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(3),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(1),
  "responseLength": NumberInt(105),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:55.86Z"),
  "op": "query",
  "ns": "yesocl.admin_group",
  "query": {
    "_id": ObjectId("515f3887471dee8c0b000001")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(91),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(4)
    }
  },
  "responseLength": NumberInt(79),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:55.102Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f37c6471dee980b000000")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(151),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(166),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:55.102Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "_id": ObjectId("515f37ac471dee940b000003")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(114),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(81),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:55.117Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f3b6d471dee940b000004")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(45),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(235),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:55.133Z"),
  "op": "update",
  "ns": "yesocl.admin_group",
  "query": {
    "_id": ObjectId("515f3887471dee8c0b000001")
  },
  "updateobj": {
    "$unset": {
      "permissions": true
    }
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(101)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(6)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:55.133Z"),
  "op": "update",
  "ns": "yesocl.admin_group",
  "query": {
    "_id": ObjectId("515f3887471dee8c0b000001")
  },
  "updateobj": {
    "$pushAll": {
      "permissions": [
        {
          "_id": ObjectId("515f3b87471dee840b000002"),
          "layout": {
            "$ref": "design_layout",
            "$id": ObjectId("515f37c6471dee980b000000"),
            "$db": "yesocl"
          },
          "actions": [
            {
              "$ref": "design_action",
              "$id": ObjectId("515f37ac471dee940b000003"),
              "$db": "yesocl"
            }
          ]
        },
        {
          "_id": ObjectId("515f3b87471dee840b000003"),
          "layout": {
            "$ref": "design_layout",
            "$id": ObjectId("515f3b6d471dee940b000004"),
            "$db": "yesocl"
          },
          "actions": [
            {
              "$ref": "design_action",
              "$id": ObjectId("515f37ac471dee940b000003"),
              "$db": "yesocl"
            }
          ]
        }
      ]
    }
  },
  "idhack": true,
  "moved": true,
  "nmoved": NumberInt(1),
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(139)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(5)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:56.365Z"),
  "op": "command",
  "ns": "yesocl.$cmd",
  "command": {
    "count": "admin_group",
    "query": [
      
    ]
  },
  "ntoreturn": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(38),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(4)
    }
  },
  "responseLength": NumberInt(48),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:00:56.365Z"),
  "op": "query",
  "ns": "yesocl.admin_group",
  "query": [
    
  ],
  "ntoreturn": NumberInt(10),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(2),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(84),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(2),
      "w": NumberLong(2)
    }
  },
  "nreturned": NumberInt(2),
  "responseLength": NumberInt(2769),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:02.449Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f3b6d471dee940b000004")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(65),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(4),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(235),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:02.465Z"),
  "op": "query",
  "ns": "yesocl.admin_group",
  "query": [
    
  ],
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(2),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(76),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(4),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(2),
  "responseLength": NumberInt(2769),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:02.480Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f37c6471dee980b000000")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(40),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(166),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:02.527Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f3b6d471dee940b000004")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(37),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(4),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(235),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:02.527Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f03ef471deeac1f000000")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(13),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(1)
    }
  },
  "responseLength": NumberInt(361),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:02.527Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f03ff471deeac1f000001")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(12),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(1)
    }
  },
  "responseLength": NumberInt(360),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:02.527Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f04d5471deeac1f000004")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(11),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(1)
    }
  },
  "responseLength": NumberInt(364),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:02.527Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f0568471deeac1f000005")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(11),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(1)
    }
  },
  "responseLength": NumberInt(364),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:02.527Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f0416471deeac1f000002")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(11),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(0)
    }
  },
  "responseLength": NumberInt(358),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:02.527Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f042b471deeac1f000003")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(13),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(1)
    }
  },
  "responseLength": NumberInt(423),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:02.543Z"),
  "op": "update",
  "ns": "yesocl.admin_group",
  "query": {
    "_id": ObjectId("515f3887471dee8c0b000001")
  },
  "updateobj": {
    "$unset": {
      "permissions.1": true
    }
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(184)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(8)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:02.543Z"),
  "op": "update",
  "ns": "yesocl.admin_group",
  "query": {
    "_id": ObjectId("515f3887471dee8c0b000001")
  },
  "updateobj": {
    "$pull": {
      "permissions": null
    }
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(42)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(3)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:02.543Z"),
  "op": "remove",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f3b6d471dee940b000004")
  },
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(65)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(3)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:03.775Z"),
  "op": "command",
  "ns": "yesocl.$cmd",
  "command": {
    "count": "design_layout",
    "query": [
      
    ]
  },
  "ntoreturn": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(49),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(5)
    }
  },
  "responseLength": NumberInt(48),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:03.775Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "$query": [
      
    ],
    "$orderby": {
      "path": NumberInt(0)
    }
  },
  "ntoreturn": NumberInt(10),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(7),
  "scanAndOrder": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(197),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(2),
      "w": NumberLong(1)
    }
  },
  "nreturned": NumberInt(7),
  "responseLength": NumberInt(2276),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:06.536Z"),
  "op": "query",
  "ns": "yesocl.admin_group",
  "query": {
    "_id": ObjectId("515f3887471dee8c0b000001")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(135),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(7),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(253),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:06.552Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "$query": [
      
    ],
    "$orderby": {
      "path": NumberInt(0)
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(7),
  "scanAndOrder": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(195),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(7),
  "responseLength": NumberInt(2276),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:06.568Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f37c6471dee980b000000")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(46),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(4),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(166),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:06.583Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": {
      "_id": {
        "$in": [
          ObjectId("515bad7e471deee40e000000"),
          ObjectId("515bae15471deed805000001"),
          ObjectId("515bae1f471deed805000002"),
          ObjectId("515bae2c471deed805000003")
        ]
      }
    },
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(4),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(210),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(4)
    }
  },
  "nreturned": NumberInt(4),
  "responseLength": NumberInt(280),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:06.583Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": {
      "_id": {
        "$in": [
          ObjectId("515f37ac471dee940b000003")
        ]
      }
    },
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(166),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(1),
  "responseLength": NumberInt(81),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:06.583Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": {
      "_id": {
        "$in": [
          ObjectId("515f37ac471dee940b000003")
        ]
      }
    },
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(131),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(3),
      "w": NumberLong(1)
    }
  },
  "nreturned": NumberInt(1),
  "responseLength": NumberInt(81),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:06.583Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": {
      "_id": {
        "$in": [
          ObjectId("515bae43471deed805000004")
        ]
      }
    },
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(132),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(3),
      "w": NumberLong(1)
    }
  },
  "nreturned": NumberInt(1),
  "responseLength": NumberInt(105),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:11.934Z"),
  "op": "command",
  "ns": "yesocl.$cmd",
  "command": {
    "count": "admin_group",
    "query": [
      
    ]
  },
  "ntoreturn": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(34),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(4),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(48),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:11.934Z"),
  "op": "query",
  "ns": "yesocl.admin_group",
  "query": [
    
  ],
  "ntoreturn": NumberInt(10),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(2),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(49),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(0)
    }
  },
  "nreturned": NumberInt(2),
  "responseLength": NumberInt(2595),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:17.862Z"),
  "op": "command",
  "ns": "yesocl.$cmd",
  "command": {
    "count": "design_action",
    "query": [
      
    ]
  },
  "ntoreturn": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(38),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(4),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(48),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:17.862Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": [
      
    ],
    "$orderby": {
      "order": NumberInt(0)
    }
  },
  "ntoreturn": NumberInt(10),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(6),
  "scanAndOrder": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(142),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(1)
    }
  },
  "nreturned": NumberInt(6),
  "responseLength": NumberInt(426),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.345Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "_id": ObjectId("515f37ac471dee940b000003")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(109),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(4),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(81),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.361Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "action.id": null
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(7),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(167),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(7),
  "responseLength": NumberInt(2276),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.361Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": {
      "_id": {
        "$in": [
          ObjectId("515bad7e471deee40e000000"),
          ObjectId("515bae15471deed805000001"),
          ObjectId("515bae1f471deed805000002"),
          ObjectId("515bae2c471deed805000003")
        ]
      }
    },
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(4),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(192),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(4)
    }
  },
  "nreturned": NumberInt(4),
  "responseLength": NumberInt(280),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.361Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": {
      "_id": {
        "$in": [
          ObjectId("515bae43471deed805000004")
        ]
      }
    },
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(72),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(1)
    }
  },
  "nreturned": NumberInt(1),
  "responseLength": NumberInt(105),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.377Z"),
  "op": "update",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f03ff471deeac1f000001")
  },
  "updateobj": {
    "$unset": {
      "actions": true
    }
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(105)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(5)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.377Z"),
  "op": "update",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f0416471deeac1f000002")
  },
  "updateobj": {
    "$unset": {
      "actions": true
    }
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(38)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(4)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.377Z"),
  "op": "update",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f042b471deeac1f000003")
  },
  "updateobj": {
    "$unset": {
      "actions": true
    }
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(42)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(3)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.377Z"),
  "op": "update",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f03ef471deeac1f000000")
  },
  "updateobj": {
    "$unset": {
      "actions": true
    }
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(38)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(2)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.377Z"),
  "op": "update",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f04d5471deeac1f000004")
  },
  "updateobj": {
    "$unset": {
      "actions": true
    }
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(43)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(3)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.377Z"),
  "op": "update",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f0568471deeac1f000005")
  },
  "updateobj": {
    "$unset": {
      "actions": true
    }
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(36)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(3)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.377Z"),
  "op": "update",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f37c6471dee980b000000")
  },
  "updateobj": {
    "$unset": {
      "actions": true
    }
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(36)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(2)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.377Z"),
  "op": "update",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f03ff471deeac1f000001")
  },
  "updateobj": {
    "$pushAll": {
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
    }
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(39)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(3)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.377Z"),
  "op": "update",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f0416471deeac1f000002")
  },
  "updateobj": {
    "$pushAll": {
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
    }
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(37)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(3)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.377Z"),
  "op": "update",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f042b471deeac1f000003")
  },
  "updateobj": {
    "$pushAll": {
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
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(36)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(2)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.377Z"),
  "op": "update",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f03ef471deeac1f000000")
  },
  "updateobj": {
    "$pushAll": {
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
    }
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(39)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(2)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.377Z"),
  "op": "update",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f04d5471deeac1f000004")
  },
  "updateobj": {
    "$pushAll": {
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
    }
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(37)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(1)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.377Z"),
  "op": "update",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f0568471deeac1f000005")
  },
  "updateobj": {
    "$pushAll": {
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
    }
  },
  "idhack": true,
  "nupdated": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(37)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(3)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.377Z"),
  "op": "remove",
  "ns": "yesocl.design_action",
  "query": {
    "_id": ObjectId("515f37ac471dee940b000003")
  },
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(64)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(3)
    }
  },
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:28.392Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "$query": {
      "actions.$id": ObjectId("515f37ac471dee940b000003")
    },
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(7),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(126),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(3),
      "w": NumberLong(2)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:29.609Z"),
  "op": "command",
  "ns": "yesocl.$cmd",
  "command": {
    "count": "design_action",
    "query": [
      
    ]
  },
  "ntoreturn": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(28),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(4),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(48),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:29.609Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": [
      
    ],
    "$orderby": {
      "order": NumberInt(0)
    }
  },
  "ntoreturn": NumberInt(10),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(5),
  "scanAndOrder": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(129),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(1)
    }
  },
  "nreturned": NumberInt(5),
  "responseLength": NumberInt(365),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:33.88Z"),
  "op": "query",
  "ns": "yesocl.admin_group",
  "query": {
    "_id": ObjectId("515f3887471dee8c0b000001")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(76),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(4)
    }
  },
  "responseLength": NumberInt(253),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:33.103Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "$query": [
      
    ],
    "$orderby": {
      "path": NumberInt(0)
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(7),
  "scanAndOrder": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(185),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(7),
  "responseLength": NumberInt(2197),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:33.135Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "_id": ObjectId("515f37c6471dee980b000000")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(59),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(4)
    }
  },
  "responseLength": NumberInt(87),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:33.135Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": {
      "_id": {
        "$in": [
          ObjectId("515bad7e471deee40e000000"),
          ObjectId("515bae15471deed805000001"),
          ObjectId("515bae1f471deed805000002"),
          ObjectId("515bae2c471deed805000003")
        ]
      }
    },
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(4),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(205),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(5),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(4),
  "responseLength": NumberInt(280),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:33.150Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": {
      "_id": {
        "$in": [
          ObjectId("515f37ac471dee940b000003")
        ]
      }
    },
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(0),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(162),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:33.150Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "_id": ObjectId("515f37ac471dee940b000003")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(27),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(3),
      "w": NumberLong(2)
    }
  },
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:01:34.71Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(63),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(2)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:02:34.84Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(76),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:03:34.97Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(76),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:04:34.110Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(68),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:05:34.124Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(72),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:06:34.137Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(67),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:07:34.151Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(72),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(2)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:08:34.165Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(128),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:09:34.178Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(79),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(2),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:10:34.191Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(71),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:11:34.205Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(125),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(2)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:12:34.218Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(135),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:13:34.231Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(70),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:14:34.244Z"),
  "op": "query",
  "ns": "yesocl.system.indexes",
  "query": {
    "expireAfterSeconds": {
      "$exists": true
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(3),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(68),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(1),
      "w": NumberLong(3)
    }
  },
  "nreturned": NumberInt(0),
  "responseLength": NumberInt(20),
  "millis": NumberInt(0),
  "client": "0.0.0.0",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:14:54.915Z"),
  "op": "command",
  "ns": "yesocl.$cmd",
  "command": {
    "count": "admin_group",
    "query": [
      
    ]
  },
  "ntoreturn": NumberInt(1),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(76),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(4),
      "w": NumberLong(3)
    }
  },
  "responseLength": NumberInt(48),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:14:54.915Z"),
  "op": "query",
  "ns": "yesocl.admin_group",
  "query": [
    
  ],
  "ntoreturn": NumberInt(10),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(2),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(85),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(2),
      "w": NumberLong(1)
    }
  },
  "nreturned": NumberInt(2),
  "responseLength": NumberInt(2595),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:15:01.841Z"),
  "op": "query",
  "ns": "yesocl.admin_group",
  "query": {
    "_id": ObjectId("515f3887471dee8c0b000001")
  },
  "ntoreturn": NumberInt(1),
  "idhack": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(65),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(4),
      "w": NumberLong(4)
    }
  },
  "responseLength": NumberInt(253),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:15:01.903Z"),
  "op": "remove",
  "ns": "yesocl.admin_group",
  "query": {
    "_id": ObjectId("515f3887471dee8c0b000001")
  },
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(0),
      "w": NumberLong(119)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(0),
      "w": NumberLong(15)
    }
  },
  "millis": NumberInt(46),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:15:19.63Z"),
  "op": "query",
  "ns": "yesocl.design_layout",
  "query": {
    "$query": [
      
    ],
    "$orderby": {
      "path": NumberInt(0)
    }
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(7),
  "scanAndOrder": true,
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(333),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(7),
      "w": NumberLong(7)
    }
  },
  "nreturned": NumberInt(7),
  "responseLength": NumberInt(2197),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});
db.getCollection("system.profile").insert({
  "ts": ISODate("2013-04-05T21:15:19.110Z"),
  "op": "query",
  "ns": "yesocl.design_action",
  "query": {
    "$query": [
      
    ],
    "$orderby": [
      
    ]
  },
  "ntoreturn": NumberInt(0),
  "ntoskip": NumberInt(0),
  "nscanned": NumberInt(5),
  "keyUpdates": NumberInt(0),
  "numYield": NumberInt(0),
  "lockStats": {
    "timeLockedMicros": {
      "r": NumberLong(109),
      "w": NumberLong(0)
    },
    "timeAcquiringMicros": {
      "r": NumberLong(6),
      "w": NumberLong(5)
    }
  },
  "nreturned": NumberInt(5),
  "responseLength": NumberInt(365),
  "millis": NumberInt(0),
  "client": "127.0.0.1",
  "user": ""
});

/** user records **/

/** user_group records **/
db.getCollection("user_group").insert({
  "_id": ObjectId("5143bf22913db4ec0400000c"),
  "name": "Default"
});

/** ward records **/
db.getCollection("ward").insert({
  "_id": ObjectId("5143c008913db4ac08000005"),
  "name": "10",
  "status": true,
  "district": {
    "$ref": "district",
    "$id": ObjectId("5143bfec913db4ac08000004"),
    "$db": "yesocl"
  }
});
