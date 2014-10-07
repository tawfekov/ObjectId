========
ObjectId
========


Unique Id generator inspired by mongodb object id


Overview
--------

`ObjectId <objectid>` is a 12-byte `String` type,
constructed using:

- a 4-byte value representing the seconds since the Unix epoch or some folks call it  `unix timestamp`
- a 3-byte machine identifier `hostname`
- a 2-byte process id
- a 3-byte counter, starting with a random value.

In `RDMS`, records stored in a table require a unique id field that acts as a primary key. Because ObjectIds are small, most likely unique, and fast to generate you may want to use it in your next project
