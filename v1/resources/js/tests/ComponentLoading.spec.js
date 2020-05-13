import { mount, createLocalVue } from '@vue/test-utils'
import ComponentLoading from '../components/ComponentLoading'
import FontAwesomeIcon from '@fortawesome/vue-fontawesome'
import fontawesome from '@fortawesome/fontawesome'
import fas from '@fortawesome/fontawesome-free-solid'
import fab from '@fortawesome/fontawesome-free-brands'
import far from '@fortawesome/fontawesome-free-regular'

fontawesome.library.add( fas, fab, far )


describe('ComponentLoading', () => {
  const localVue = createLocalVue()
  const fontawesome = localVue.component('fa', FontAwesomeIcon)
  const wrapper = mount(ComponentLoading, {localVue, fontawesome})

  test('renders correctly', () => {
    expect(wrapper.isVueInstance()).toBeTruthy()
    expect(wrapper.html()).toMatchSnapshot()
  })

  it('has spinner', () => {
    expect(wrapper.html()).toContain('icon="spinner"')
  })
})
