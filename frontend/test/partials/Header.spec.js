import { mount } from '@vue/test-utils'
import Header from '@/components/partials/Header'

describe('Header', () => {
  const wrapper = mount(Header)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })

  it('button toggles the menu', async () => {
    const button = wrapper.find('button')
    await button.trigger('click')
    expect(wrapper.vm.isOpen).toBe(true)
    await button.trigger('click')
    expect(wrapper.vm.isOpen).toBe(false)
  })

  it('listens to close-menu custom event', async () => {
    wrapper.vm.$root.$emit('close-menu')
    await wrapper.vm.$nextTick()

    expect(wrapper.emitted('close-menu'))
    expect(wrapper.vm.isOpen).toBe(false)
  })
})
