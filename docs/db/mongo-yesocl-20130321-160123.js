
/** user indexes **/
db.getCollection("user").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** user records **/
db.getCollection("user").insert({
  "_id": ObjectId("51453169913db4e80e000048"),
  "background": {
    "_id": ObjectId("514b1631913db4ac08000062"),
    "educations": [
      {
        "_id": ObjectId("514b1631913db4ac08000063"),
        "school": "University of Economics Ho Chi Minh City",
        "started": "",
        "ended": "",
        "degree": "Bachelor Of Engineering",
        "fieldOfStudy": "Accounting",
        "grace": "",
        "societies": "",
        "description": ""
      }
    ],
    "interest": "",
    "birthday": ISODate("2013-03-04T23:00:00.0Z"),
    "maritalStatus": false,
    "adviceForContact": ""
  },
  "created": ISODate("2013-03-17T02:58:49.0Z"),
  "emails": [
    {
      "_id": ObjectId("514b1631913db4ac08000064"),
      "email": "testemail@gmail.com",
      "primary": true
    }
  ],
  "groupUser": {
    "$ref": "user_group",
    "$id": ObjectId("5143bf22913db4ec0400000c"),
    "$db": "yesocl"
  },
  "meta": {
    "_id": ObjectId("514b1631913db4ac08000060"),
    "firstname": "affdsfdsf",
    "lastname": "fasdfa",
    "headingLine": "",
    "location": {
      "_id": ObjectId("514b1631913db4ac08000061"),
      "countryId": "5143bfa3913db4a408000011",
      "country": "Việt Nam",
      "cityId": "5143bfca913db4a408000012",
      "city": "HCM"
    },
    "postalCode": "12345",
    "industry": "Chemicals",
    "address": "asdvdfg"
  },
  "password": "aca1bf99781a15bb750e24f41e0440c02ad3bb1f",
  "status": true
});
