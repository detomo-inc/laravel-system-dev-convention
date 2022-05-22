# Sample program

## Overview

Project name: Multilingual dictionary.

First, create full stack Laravel system.
Then, devide it into Laravel backend and Vuejs frontend systems.

## Requirement

### User and priviledges.
* User is devided into group. Access priviledges are assigned to group.
* User role
  1. Group admin (can manage user, manage dictionaries).
  2. Group editor (can manage word).
  3. Group viewer (any member in a group can view words in editor)

### Group

* Group is a set users. One user may belongs to many gorups.

### Dictionary

* Dictionary has visibility of public or private.
* Public dictionary can be seen by any user.
* Private dictionary can be seen by its group's user.
* A group that does not own the dictionary can see it.
* A dictionary is specified which languages it correspondes. One of it is set as original language.

### Words

* A word is multilingual translation.
* A language of a word is set as original language. It is set as dictionary's original language by default, but can be changed.