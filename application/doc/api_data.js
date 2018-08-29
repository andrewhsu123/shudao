define({ "api": [
  {
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "varname1",
            "description": "<p>No type.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "varname2",
            "description": "<p>With type.</p>"
          }
        ]
      }
    },
    "type": "",
    "url": "",
    "version": "0.0.0",
    "filename": "./doc/main.js",
    "group": "D__phpStudy_www_shudaooApi_application_doc_main_js",
    "groupTitle": "D__phpStudy_www_shudaooApi_application_doc_main_js",
    "name": ""
  },
  {
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "varname1",
            "description": "<p>No type.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "varname2",
            "description": "<p>With type.</p>"
          }
        ]
      }
    },
    "type": "",
    "url": "",
    "version": "0.0.0",
    "filename": "./index/controller/doc/main.js",
    "group": "D__phpStudy_www_shudaooApi_application_index_controller_doc_main_js",
    "groupTitle": "D__phpStudy_www_shudaooApi_application_index_controller_doc_main_js",
    "name": ""
  },
  {
    "type": "get",
    "url": "http://shudaooapi.com/:abc2",
    "title": "",
    "name": "________1",
    "group": "TestGroup2",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>用户唯一标识符</p>"
          },
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>用户编号</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "code",
            "description": "<p>100</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "msg",
            "description": "<p>接口访问成功</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "data",
            "description": "<p>[]</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n    \"tile\": \"文章标题2\",\n    \"date\": 1483941498230,\n    \"author\": \"classlfz\",\n    \"content\": \"文章的详细内容\"\n   }",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>对应id的文章信息不存在</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 对应id的文章信息不存在\n{\n  \"error\": err\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./index/controller/Index.php",
    "groupTitle": "TestGroup2"
  },
  {
    "type": "get",
    "url": "http://shudaooapi.com/:abc",
    "title": "",
    "name": "________",
    "group": "TestGroup",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>用户唯一标识符</p>"
          },
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>用户编号</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "code",
            "description": "<p>100</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "msg",
            "description": "<p>接口访问成功</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "data",
            "description": "<p>[]</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n    \"tile\": \"文章标题2\",\n    \"date\": 1483941498230,\n    \"author\": \"classlfz\",\n    \"content\": \"文章的详细内容\"\n   }",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>对应id的文章信息不存在</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 对应id的文章信息不存在\n{\n  \"error\": err\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./index/controller/Index.php",
    "groupTitle": "TestGroup"
  },
  {
    "type": "get",
    "url": "http://shudaooapi.com/:abc1",
    "title": "",
    "name": "________1",
    "group": "TestGroup",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>用户唯一标识符</p>"
          },
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>用户编号</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "code",
            "description": "<p>100</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "msg",
            "description": "<p>接口访问成功</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "data",
            "description": "<p>[]</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n    \"tile\": \"文章标题2\",\n    \"date\": 1483941498230,\n    \"author\": \"classlfz\",\n    \"content\": \"文章的详细内容\"\n   }",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>对应id的文章信息不存在</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 对应id的文章信息不存在\n{\n  \"error\": err\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./index/controller/Index.php",
    "groupTitle": "TestGroup"
  }
] });
