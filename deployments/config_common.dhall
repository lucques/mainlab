----------------------------------------------------
-- Locations of conjin framework, app, deployment --
----------------------------------------------------

let t              = ./EXTERNAL_TOOLS_PATH
let T              = t.types
let P              = t.prelude

let conjinDir      = ./CONJIN_DIR      as Text
let appDir         = ./APP_DIR         as Text
let deploymentsDir = ./DEPLOYMENTS_DIR as Text


-------------------
-- Common config --
-------------------

-- Local bare modules
let localInterbookTemplateBare = {
  , location = { dirName = "template-interbook-local", isExternal = False }
  , scssModuleDeps = [
      T.bareModuleToLocation (T.BareModule.Bootstrap {=}),
      T.bareModuleToLocation (T.BareModule.TemplateBootstrapped {=}),
      T.bareModuleToLocation (T.BareModule.TemplateNavigable {=}),
      T.bareModuleToLocation (T.BareModule.TemplateInterbook {=})
    ]
}


let localBareModules = [
  -- Internal
  , localInterbookTemplateBare
  , t.makeLocalBareModuleWithoutDeps "role-info" False
  , t.makeLocalBareModuleWithoutDeps "role-info-db" False
  , t.makeLocalBareModuleWithoutDeps "role-app" False
  , t.makeLocalBareModuleWithoutDeps "js-standard-lib" False
  -- External
  , t.makeLocalBareModuleWithoutDeps "mathjs" True
  , t.makeLocalBareModuleWithoutDeps "nerdamer" True
]

-- Modules
let localInterbookTemplate = {
  , bare = T.BareModule.LocalBareModule localInterbookTemplateBare
  , compileScss = True
  , config = t.prelude.JSON.null
}: T.Module

let modules = [ localInterbookTemplate ]

let authorization = {
    , rootUser  = "root"
    , guestUser = "guest"

    , users2groups = P.List.empty T.User2Group

    , actors2privileges = [
        , t.grantPreprocPrivToUser "preprocess"
        , t.grantDebugPrivToUser   "admin"
    ]

    , actors2targetRules = [
        -- admin
        , t.allowViewActionForUser   (t.prelude.List.empty Text) "guest"
    ]
}

in

{
  , t

  , conjinDir
  , appDir
  , deploymentsDir

  , localBareModules
  , modules
  , authorization
}