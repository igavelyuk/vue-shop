# Contributing Guide

**Working on your first Pull Request?** You can learn how from this *free* series [How to Contribute to an Open Source Project on GitHub][First PR]

## How to contribute

* Fork, Star and Watch the project from the `master` branch and submit a Pull Request (PR)
  * Explain what the PR fixes or improves
  * Screenshots for bonus points
* Use sensible commit messages
  * If your PR fixes a separate issue number, include it in the commit message
* Use a sensible number of commit messages as well
  * e.g. Your PR should not have 100s of commits

## Steps for adding a new page/feature or removing an existing page/feature
* Start any job from `issue`
* Start from simple component
* If files not exists create `issue` describe your theoretical actions
* Start working on, even without my approval, just make another post about you are working on this.
* Do in this way - like you like to explain to somebody what the point.

## Things to keep in mind

* Smaller Pull Requests are likely to be merged more quickly than bigger changes
* This project is using a [KISS Workflow](https://en.wikipedia.org/wiki/KISS_principle)
  * Pull Requests and bugfixes are directly merged into `master` after sanity testing
  * `master` is basically consider the main developer branch
    * We no longer wait to get changes into master when there is a release/milestone/version!
  * the release branches and version tags are considered stable and frozen
* This project is using [Semantic Versioning 2.0.0](http://semver.org/)
  * If a bugfix or PR is *not* trivial it will likely end up in the next **MINOR** version
  * If a bugfix or PR *is* trivial *or* critical it will likely end up in the next **PATCH** version
* Useful Pull Requests **will** get merged in eventually
  * [E.g. see how many have already been merged vs. still open][pulls]

## Commit messages

* Squashing to 1 commit is **not** required at this time
* Use sensible commit messages (when in doubt: `git log`)
* Use a sensible number of commit messages
* If your PR fixes a specific issue number, include it in the commit message: `"Fixes XYZ error (fixes #123)"`

### Shell Scripts

* Follow [ShellCheck](https://github.com/koalaman/shellcheck) - A shell script static analysis tool
* Try to follow [Google's Shell Style Guide](https://google.github.io/styleguide/shell.xml)


<!-- link references -->

[First PR]: https://egghead.io/series/how-to-contribute-to-an-open-source-project-on-github
