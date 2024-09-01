let common = ../../config_common.dhall

let t = common.t
let T = common.t.types
let P = common.t.prelude


------------
-- Config --
------------

let deplName = "lmainlab"
let deplDir  = common.deploymentsDir ++ "/" ++ deplName

let authentication = {
    , loginWithoutUserName = True
    , users2passwords = [
        , t.assignUser2Password "root"        "rutus"
        , t.assignUser2Password "admin"       "asdf"
        , t.assignUser2Password "preprocess"  "preprocess"
        , t.assignUser2Password "linkchecker" "linkchecker"
    ]
}

in

t.makeDefaultDockerNginxDepl
    deplName
    common.conjinDir
    common.appDir
    deplDir
    authentication
    common.authorization
    (None T.DockerDb)
    common.localBareModules
    common.modules
: T.DockerNginxDepl