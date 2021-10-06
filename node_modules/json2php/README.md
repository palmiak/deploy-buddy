json2php
========

### Instalation

To install json2php you could clone the project from Github or use NPM to install it.

```bash
$ npm install json2php
```

### Usage

Convert JSON to PHP representation

#### String

When the content is just a string the output will be the same string.

```javascript
json2php('Hello World!')
// => 'Hello World!'
```

#### Numer

Numbers are the same.

```javascript
json2php(123)
// => 123
```

#### Undefined/Null

`null` and `undefined` are returned as `null`

```javascript
json2php(undefined) -> null
```

#### Array

```javascript
json2php([1, 2, 3])
// => array(1, 2, 3)
```

#### Object

```javascript
json2php({a: 1, b: 2, c: 'text'})
// => array('a' => 1, 'b' => 2, 'c' => 'text')
```

#### Non-valid JSON

```javascript
json2php(new Date())
// => null
```


### Tests

To run test we use `mocha` framework. There is a `cake` task for that.

```bash
$ cake test
```

or use `npm`

```bash
$ npm test
```

But in any case you will depend on `coffee-script`

### CoffeeScript Source

```bash
$ coffee -c -b -o ./lib src/json2php.coffee
```
### Changelog

#### 0.0.4
  * Fix for single quotes escaping (thanks to @ksky521)

#### 0.0.3
  * Fixed the case when non-valid JSON is passed
  * Fixing the bug with the object section

#### 0.0.2
  * Adding the package.json to Git repository, also package dependancy
  * Changes into the file structure
  * Adding CoffeeScript source ( Not finished yet )
  * Adding Cakefile and task `test`
  * Adding Mocha for test framework.
  * Adding `test`, `src`, `lib` directory
  * Adding tests

#### 0.0.1
  * Init the project into NPM
  * module.exports for Node.js
  * Added json2php into the global scope with global.json2php
