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
      { path: 'tags/:tags/edit', name: 'settings.tags.edit', component: SettingsTagsEdit }
    ] },

  { path: '*', component: NotFound }
]
