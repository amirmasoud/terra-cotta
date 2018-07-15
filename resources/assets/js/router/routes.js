const Welcome = () => import('~/pages/welcome').then(m => m.default || m)
const Login = () => import('~/pages/auth/login').then(m => m.default || m)
const Register = () => import('~/pages/auth/register').then(m => m.default || m)
const PasswordEmail = () => import('~/pages/auth/password/email').then(m => m.default || m)
const PasswordReset = () => import('~/pages/auth/password/reset').then(m => m.default || m)
const NotFound = () => import('~/pages/errors/404').then(m => m.default || m)

const Home = () => import('~/pages/home').then(m => m.default || m)
const Settings = () => import('~/pages/settings/index').then(m => m.default || m)
const SettingsProfile = () => import('~/pages/settings/profile').then(m => m.default || m)
const SettingsPassword = () => import('~/pages/settings/password').then(m => m.default || m)

const SettingsIconsBrowse = () => import('~/pages/settings/icons/browse').then(m => m.default || m)
const SettingsIconsShow = () => import('~/pages/settings/icons/show').then(m => m.default || m)
const SettingsIconsCreate = () => import('~/pages/settings/icons/create').then(m => m.default || m)
const SettingsIconsEdit = () => import('~/pages/settings/icons/edit').then(m => m.default || m)

const SettingsTagsBrowse = () => import('~/pages/settings/tags/browse').then(m => m.default || m)
const SettingsTagsShow = () => import('~/pages/settings/tags/show').then(m => m.default || m)
const SettingsTagsCreate = () => import('~/pages/settings/tags/create').then(m => m.default || m)
const SettingsTagsEdit = () => import('~/pages/settings/tags/edit').then(m => m.default || m)

const SettingsCategoriesBrowse = () => import('~/pages/settings/categories/browse').then(m => m.default || m)
const SettingsCategoriesShow = () => import('~/pages/settings/categories/show').then(m => m.default || m)
const SettingsCategoriesCreate = () => import('~/pages/settings/categories/create').then(m => m.default || m)
const SettingsCategoriesEdit = () => import('~/pages/settings/categories/edit').then(m => m.default || m)

const SettingsTypesBrowse = () => import('~/pages/settings/types/browse').then(m => m.default || m)
const SettingsTypesShow = () => import('~/pages/settings/types/show').then(m => m.default || m)
const SettingsTypesCreate = () => import('~/pages/settings/types/create').then(m => m.default || m)
const SettingsTypesEdit = () => import('~/pages/settings/types/edit').then(m => m.default || m)

const SettingsGroupsBrowse = () => import('~/pages/settings/groups/browse').then(m => m.default || m)
const SettingsGroupsShow = () => import('~/pages/settings/groups/show').then(m => m.default || m)
const SettingsGroupsCreate = () => import('~/pages/settings/groups/create').then(m => m.default || m)
const SettingsGroupsEdit = () => import('~/pages/settings/groups/edit').then(m => m.default || m)

export default [
  { path: '/', name: 'welcome', component: Welcome },

  { path: '/login', name: 'login', component: Login },
  { path: '/register', name: 'register', component: Register },
  { path: '/password/reset', name: 'password.request', component: PasswordEmail },
  { path: '/password/reset/:token', name: 'password.reset', component: PasswordReset },

  { path: '/home', name: 'home', component: Home },
  { path: '/settings',
    component: Settings,
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: SettingsProfile },
      { path: 'password', name: 'settings.password', component: SettingsPassword },

      { path: 'icons', name: 'settings.icons.browse', component: SettingsIconsBrowse },
      { path: 'icons/create', name: 'settings.icons.create', component: SettingsIconsCreate },
      { path: 'icons/:icons', name: 'settings.icons.show', component: SettingsIconsShow },
      { path: 'icons/:icons/edit', name: 'settings.icons.edit', component: SettingsIconsEdit },

      { path: 'tags', name: 'settings.tags.browse', component: SettingsTagsBrowse },
      { path: 'tags/create', name: 'settings.tags.create', component: SettingsTagsCreate },
      { path: 'tags/:tags', name: 'settings.tags.show', component: SettingsTagsShow },
      { path: 'tags/:tags/edit', name: 'settings.tags.edit', component: SettingsTagsEdit },

      { path: 'categories', name: 'settings.categories.browse', component: SettingsCategoriesBrowse },
      { path: 'categories/create', name: 'settings.categories.create', component: SettingsCategoriesCreate },
      { path: 'categories/:categories', name: 'settings.categories.show', component: SettingsCategoriesShow },
      { path: 'categories/:categories/edit', name: 'settings.categories.edit', component: SettingsCategoriesEdit },

      { path: 'types', name: 'settings.types.browse', component: SettingsTypesBrowse },
      { path: 'types/create', name: 'settings.types.create', component: SettingsTypesCreate },
      { path: 'types/:types', name: 'settings.types.show', component: SettingsTypesShow },
      { path: 'types/:types/edit', name: 'settings.types.edit', component: SettingsTypesEdit },

      { path: 'groups', name: 'settings.groups.browse', component: SettingsGroupsBrowse },
      { path: 'groups/create', name: 'settings.groups.create', component: SettingsGroupsCreate },
      { path: 'groups/:groups', name: 'settings.groups.show', component: SettingsGroupsShow },
      { path: 'groups/:groups/edit', name: 'settings.groups.edit', component: SettingsGroupsEdit }
    ] },

  { path: '*', component: NotFound }
]
